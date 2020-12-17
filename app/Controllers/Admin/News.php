<?php 
namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class News extends AdminController
{
	public function index()
	{
		if($this->request->isAJAX()){
			$where = "is_delete = 0";
			$order = "sort DESC";
			$info = $this->db->table('v1_new')->where($where)->orderBy($order)->get()->getResultArray();
			$class = $this->init_class();
			$account = $this->init_account();
			$data = array();
			if(!empty($info)){
				foreach($info as $key=>$val){
					$data[$key]['field0'] = "<label class='pos-rel'><input type='checkbox' class='ace' name='info[id]' value='".$val['id']."'><span class='lbl'></span></label>";
					$data[$key]['field1'] = $val['title'];
					$data[$key]['field2'] = !empty($class[$val['class_id']]) ? $class[$val['class_id']] : '';
					$data[$key]['field3'] = $val['keywords'];
					$data[$key]['field4'] = !empty($account[$val['publisher']]) ? $account[$val['publisher']] : '';
					$data[$key]['field5'] = '<td>
						<div class="hidden-sm hidden-xs btn-group">
							<button class="btn btn-xs btn-info">
								<a href="/admin/News/edit?id='.$val['id'].'" style="color:#fff;"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
							</button>
							<button class="btn btn-xs btn-danger" onclick="del('.$val['id'].')">
								<i class="ace-icon fa fa-trash-o bigger-120"></i>
							</button>
						</div>
					</td>';
				}
			}
			$this->result('0','success',$data);
		}else{
			return view('Admin/news_list');
		}
	}

	public function add(){
		if($this->request->isAJAX()){
			$title = !empty($_POST['title']) ? $_POST['title'] : '';
			$class_id = !empty($_POST['class_id']) ? $_POST['class_id'] : '';
			$keywords = !empty($_POST['keywords']) ? $_POST['keywords'] : '';
			$description = !empty($_POST['description']) ? $_POST['description'] : '';
			$pictrue = !empty($_POST['imgname']) ? $_POST['imgname'] : '';
			$release_time = !empty($_POST['release_time']) ? $_POST['release_time'] : '';
			$sort = !empty($_POST['sort']) ? $_POST['sort'] : 1;
			$hit = !empty($_POST['hit']) ? $_POST['hit'] : 0;
			$content = !empty($_POST['content']) ? $_POST['content'] : '';
			$save_data = array(
				'title'=>$title,
				'class_id'=>$class_id,
				'keywords'=>$keywords,
				'description'=>$description,
				'publisher'=>$this->master_id,
				'pictrue'=>$pictrue,
				'release_time'=>strtotime($release_time),
				'sort'=>$sort,
				'hit'=>$hit,
				'content'=>$content,
				'create_time'=>time()
			);
			$result = $this->db->table('v1_new')->insert($save_data);
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}else{
			$class = $this->get_class();
			return view('Admin/news_add',array(
				'class'=>$class
			));
		}
	}

	public function edit(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			if(empty($id)){
				return $this->result(1,'参数错误');
			}
			$title = !empty($_POST['title']) ? $_POST['title'] : '';
			$class_id = !empty($_POST['class_id']) ? $_POST['class_id'] : '';
			$keywords = !empty($_POST['keywords']) ? $_POST['keywords'] : '';
			$description = !empty($_POST['description']) ? $_POST['description'] : '';
			$pictrue = !empty($_POST['imgname']) ? $_POST['imgname'] : '';
			$release_time = !empty($_POST['release_time']) ? $_POST['release_time'] : '';
			$sort = !empty($_POST['sort']) ? $_POST['sort'] : 1;
			$hit = !empty($_POST['hit']) ? $_POST['hit'] : 0;
			$content = !empty($_POST['content']) ? $_POST['content'] : '';
			$save_data = array(
				'title'=>$title,
				'class_id'=>$class_id,
				'keywords'=>$keywords,
				'description'=>$description,
				'publisher'=>$this->master_id,
				'pictrue'=>$pictrue,
				'release_time'=>strtotime($release_time),
				'sort'=>$sort,
				'hit'=>$hit,
				'content'=>$content
			);
			$result = $this->db->table('v1_new')->where('id',$id)->update($save_data);
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}else{
			$id = $_GET['id'];
			$info = $this->db->table('v1_new')->where('id = '.$id)->get()->getRowArray();
			$class = $this->get_class($info['class_id']);
			return view('Admin/news_edit',array(
				'info'=>$info,
				'json_info'=>json_encode(array('0'=>$info['pictrue'],'1'=>$info['id'])),
				'class'=>$class
			));
		}
	}

	public function get_class($class_id = 0){
		$list = $this->db->table('v1_news_class')->select('id,name')->where('is_delete = 0 and pid = 0')->get()->getResultArray();
		$str = "";
		$level = 1;
		foreach($list as $key=>$val){
			$selected = '';
			if($class_id != 0 && $val['id'] == $class_id){
				$selected = 'selected';
			}
			$str .= "<option value='".$val['id']."' ".$selected.">".$val['name']."</option>";
			$string = $this->get_child($val['id'],$str,$level,$class_id);
		}
		return $string;
	}
	public function get_child($id,$str,$level,$class_id){
		$list = $this->db->table('v1_news_class')->select('id,name')->where('is_delete = 0 and pid = '.$id)->get()->getResultArray();
		if(!empty($list)){
			$level++;
			foreach($list as $key=>$val){
				$selected = '';
				if($class_id != 0 && $val['id'] == $class_id){
					$selected = 'selected';
				}
				$str .= "<option value='".$val['id']."' ".$selected.">".str_repeat('&nbsp;&nbsp;&nbsp;',$level)."|".str_repeat('-',$level).$val['name']."</option>";
				$str = $this->get_child($val['id'],$str,$level,$class_id);
			}
		}
		return $str;
	}

	public function del(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			if(empty($id)){
				return $this->result(1,'参数错误!');
			}
			$result = $this->db->table('v1_new')->where('id',$id)->update(array('is_delete'=>1));
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}
	}
}
