<?php 
namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Banner extends AdminController
{
	public function index()
	{
		$space = $this->get_space();
		$_space = array();
		foreach($space as $key=>$val){
			$_space[$val['id']] = $val['title'];
		}
		if($this->request->isAJAX()){
			$select = '*';
			$where = "is_delete = 0";
			$order = "id DESC";
			$info = $this->db->table('v1_banner')->select($select)->where($where)->orderBy($order)->get()->getResultArray();
			$data = array();
			if(!empty($info)){
				foreach($info as $key=>$val){
					$data[$key]['field0'] = "<label class='pos-rel'><input type='checkbox' class='ace' name='id' value='".$val['id']."'><span class='lbl'></span></label>";
					$data[$key]['field1'] = $val['title'];
					$data[$key]['field2'] = !empty($val['space_id']) && !empty($_space[$val['space_id']]) ? $_space[$val['space_id']] : '';
					$data[$key]['field3'] = "<a href='".$val['pictrue']."' data-rel='colorbox' class='cboxElement' target='_blank'><img src='".$val['pictrue']."' width='100'></a>";
					$data[$key]['field4'] = $val['url'];
					$data[$key]['field5'] = $val['sort'];
					$data[$key]['field6'] = '<td>
						<div class="hidden-sm hidden-xs btn-group">
							<button class="btn btn-xs btn-info">
								<a href="/admin/Banner/edit?id='.$val['id'].'" style="color:#fff;"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
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
			return view('Admin/banner_list');
		}
	}

	public function add(){
		if($this->request->isAJAX()){
			$title = !empty($_POST['title']) ? $_POST['title'] : '';
			$keyworlds = !empty($_POST['keyworlds']) ? $_POST['keyworlds'] : '';
			$description = !empty($_POST['description']) ? $_POST['description'] : '';
			$space_id = !empty($_POST['space_id']) ? $_POST['space_id'] : 0;
			$url = !empty($_POST['url']) ? $_POST['url'] : '';
			$sort = !empty($_POST['sort']) ? $_POST['sort'] : 1;
			$pictrue = !empty($_POST['imgname']) ? $_POST['imgname'] : '';
			$save_data = array(
				'title'=>$title,
				'keyworlds'=>$keyworlds,
				'description'=>$description,
				'space_id'=>$space_id,
				'url'=>$url,
				'sort'=>$sort,
				'pictrue'=>$pictrue,
				'create_time'=>time(),
				'create_master'=>$this->master_id
			);
			$result = $this->db->table('v1_banner')->insert($save_data);
			if($result){
				$this->result(0,'success');
			}else{
				$this->result(1,'fail');
			}
		}else{
			$space = $this->get_space();
			return view('Admin/banner_add',array(
				'space'=>$space
			));
		}
	}

	public function edit(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			$title = !empty($_POST['title']) ? $_POST['title'] : '';
			$keyworlds = !empty($_POST['keyworlds']) ? $_POST['keyworlds'] : '';
			$description = !empty($_POST['description']) ? $_POST['description'] : '';
			$space_id = !empty($_POST['space_id']) ? $_POST['space_id'] : 0;
			$url = !empty($_POST['url']) ? $_POST['url'] : '';
			$sort = !empty($_POST['sort']) ? $_POST['sort'] : '';
			$pictrue = !empty($_POST['imgname']) ? $_POST['imgname'] : '';
			$save_data = array(
				'title'=>$title,
				'keyworlds'=>$keyworlds,
				'description'=>$description,
				'space_id'=>$space_id,
				'url'=>$url,
				'sort'=>$sort,
				'pictrue'=>$pictrue,
			);
			$result = $this->db->table('v1_banner')->where('id',$id)->update($save_data);
			if($result){
				$this->result(0,'success');
			}else{
				$this->result(1,'fail');
			}
		}else{
			$space = $this->get_space();
			$id = $_GET['id'];
			$info = $this->db->table('v1_banner')->where('id',$id)->get()->getRowArray();
			return view('Admin/banner_edit',array(
				'info'=>$info,
				'space'=>$space,
				'json_info'=>json_encode(array('0'=>$info['pictrue'],'1'=>$info['id']))
			));
		}
	}

	public function del(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			if(empty($id)){
				return $this->result(1,'参数错误');
			}
			$result = $this->db->table('v1_banner')->where('id',$id)->update(array('is_delete'=>1));
			if($result){
				$this->result(0,'success');
			}else{
				$this->result(1,'fail');
			}
		}else{
			return $this->result(1,'fail');
		}
	}
	public function del_pictrue(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			if(empty($id)){
				return $this->result(1,'参数错误');
			}
			$this->result(0,'success');
		}
	}

	public function get_space(){
		$info = $this->db->table('v1_banner_space')->where('is_delete = 0')->get()->getResultArray();
		return $info;
	}
}
