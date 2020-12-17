<?php 
namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Product extends AdminController
{

	public function index(){
		$class = $this->_get_class();
		if($this->request->isAJAX()){
			$select = "*";
			$where = " is_delete = 0 ";
			$orderby = "sort DESC ";
			$info = $this->db->table('v1_product')->select($select)->where($where)->orderBy($orderby)->get()->getResultArray();
			$data = array();
			if(!empty($info)){
				foreach($info as $key=>$val){
					$data[$key]['field0'] = "<label class='pos-rel'><input type='checkbox' class='ace' name='id' value='".$val['id']."'><span class='lbl'></span></label>";
					$data[$key]['field1'] = $val['title'];
					$data[$key]['field2'] = $val['url'];
					$data[$key]['field3'] = !empty($class[$val['class_id']]) ? $class[$val['class_id']] : '';
					$data[$key]['field4'] = $val['sort'];
					$data[$key]['field5'] = '<td>
						<div class="hidden-sm hidden-xs btn-group">
							<button class="btn btn-xs btn-info">
								<a href="/Admin/Product/edit?id='.$val['id'].'" style="color:#fff;"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
							</button>
							<button class="btn btn-xs btn-danger" onclick="del('.$val['id'].')">
								<i class="ace-icon fa fa-trash-o bigger-120"></i>
							</button>
						</div>
					</td>';	
				}
			}
			$this->result(0,'success',$data);
		}else{
			return view('Admin/product_list');
		}
	}

	public function add(){
		if($this->request->isAJAX()){
			$save_data['title'] = !empty($_POST['title']) ? $_POST['title'] : '';
			$save_data['url'] = !empty($_POST['url']) ? $_POST['url'] : '';
			$save_data['class_id'] = !empty($_POST['class_id']) ? $_POST['class_id'] : '';
			$save_data['sort'] = !empty($_POST['sort']) ? $_POST['sort'] : 1;
			$save_data['keywords'] = !empty($_POST['keywords']) ? $_POST['keywords'] : '';
			$save_data['price'] = !empty($_POST['price']) ? $_POST['price'] : 0;
			$save_data['description'] = !empty($_POST['description']) ? $_POST['description'] : '';
			$save_data['pictrue'] = !empty($_POST['imgname']) ? $_POST['imgname'] : '';
			$save_data['content'] = !empty($_POST['content']) ? $_POST['content'] : '';
			$save_data['create_time'] = time();
			$save_data['create_master'] = $this->master_id;
			$result = $this->db->table('v1_product')->insert($save_data);
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}else{
			$class = $this->get_class();
			return view('Admin/product_add',array(
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
			$save_data['title'] = !empty($_POST['title']) ? $_POST['title'] : '';
			$save_data['url'] = !empty($_POST['url']) ? $_POST['url'] : '';
			$save_data['class_id'] = !empty($_POST['class_id']) ? $_POST['class_id'] : '';
			$save_data['sort'] = !empty($_POST['sort']) ? $_POST['sort'] : 1;
			$save_data['keywords'] = !empty($_POST['keywords']) ? $_POST['keywords'] : '';
			$save_data['price'] = !empty($_POST['price']) ? $_POST['price'] : 0;
			$save_data['description'] = !empty($_POST['description']) ? $_POST['description'] : '';
			$save_data['pictrue'] = !empty($_POST['imgname']) ? $_POST['imgname'] : '';
			$save_data['content'] = !empty($_POST['content']) ? $_POST['content'] : '';
			$result = $this->db->table('v1_product')->where('id',$id)->update($save_data);
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}else{
			$id = $_GET['id'];
			$info = $this->db->table('v1_product')->where('id',$id)->get()->getRowArray();
			$class = $this->get_class($info['class_id']);
			return view('Admin/product_edit',array(
				'info'=>$info,
				'json_info'=>json_encode(array('0'=>$info['pictrue'],'1'=>$info['id'])),
				'class'=>$class
			));
		}
	}

	public function del(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			$result = $this->db->table('v1_product')->where('id',$id)->update(array('is_delete'=>1));
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}
	}

	public function get_class($class_id = 0){
		$list = $this->db->table('v1_product_class')->select('id,title')->where('is_delete = 0 and pid = 0')->get()->getResultArray();
		$str = "";
		$level = 1;
		foreach($list as $key=>$val){
			$selected = '';
			if($class_id != 0 && $val['id'] == $class_id){
				$selected = 'selected';
			}
			$str .= "<option value='".$val['id']."' ".$selected.">".$val['title']."</option>";
			$string = $this->get_child($val['id'],$str,$level,$class_id);
		}
		return $string;
	}
	public function get_child($id,$str,$level,$class_id){
		$list = $this->db->table('v1_product_class')->select('id,title')->where('is_delete = 0 and pid = '.$id)->get()->getResultArray();
		if(!empty($list)){
			$level++;
			foreach($list as $key=>$val){
				$selected = '';
				if($class_id != 0 && $val['id'] == $class_id){
					$selected = 'selected';
				}
				$str .= "<option value='".$val['id']."' ".$selected.">".str_repeat('&nbsp;&nbsp;&nbsp;',$level)."|".str_repeat('-',$level).$val['title']."</option>";
				$str = $this->get_child($val['id'],$str,$level,$class_id);
			}
		}
		return $str;
	}
	private function _get_class(){
		$sql = "SELECT id,title FROM v1_product_class WHERE is_delete = 0";
		$class = $this->db->query($sql)->getResultArray();
		$_class = array();
		if(!empty($class)){
			foreach($class as $key=>$val){
				$_class[$val['id']] = $val['title'];
			}
		}
		return $_class;
	}
}
?>