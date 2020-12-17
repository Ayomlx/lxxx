<?php 
namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Advert extends AdminController
{

	public function index(){
		$space_list = $this->get_space();
		if($this->request->isAJAX()){
			$select = "*";
			$where = " is_delete = 0 ";
			$orderby = " sort DESC ";
			$info = $this->db->table('v1_advert')->select($select)->where($where)->orderBy($orderby)->get()->getResultArray();
			$data = array();
			if(!empty($info)){
				foreach($info as $key=>$val){
					$data[$key]['field0'] = "<label class='pos-rel'><input type='checkbox' class='ace' name='id' value='".$val['id']."'><span class='lbl'></span></label>";
					$data[$key]['field1'] = $val['title'];
					$data[$key]['field2'] = $val['url'];
					$data[$key]['field3'] = !empty($space_list[$val['space_id']]) ? $space_list[$val['space_id']] : '';
					$data[$key]['field4'] = "<img src='".$val['pictrue']."' width='100'>";
					$data[$key]['field5'] = $val['sort'];
					$data[$key]['field6'] = '<td>
						<div class="hidden-sm hidden-xs btn-group">
							<button class="btn btn-xs btn-info">
								<a href="/Admin/Advert/edit?id='.$val['id'].'" style="color:#fff;"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
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
			return view('Admin/advert_list');
		}
	}

	public function add(){
		if($this->request->isAJAX()){
			$save_data['title'] = !empty($_POST['title']) ? $_POST['title'] : '';
			$save_data['url'] = !empty($_POST['url']) ? $_POST['url'] : '';
			$save_data['space_id'] = !empty($_POST['space_id']) ? $_POST['space_id'] : '';
			$save_data['sort'] = !empty($_POST['sort']) ? $_POST['sort'] : '';
			$save_data['start_time'] = !empty($_POST['start_time']) ? strtotime($_POST['start_time']) : '';
			$save_data['end_time'] = !empty($_POST['end_time']) ? strtotime($_POST['end_time']) : '';
			$save_data['pictrue'] = !empty($_POST['imgname']) ? $_POST['imgname'] : '';
			$save_data['create_time'] = time();
			$save_data['create_master'] = $this->master_id;
			$result = $this->db->table('v1_advert')->insert($save_data);
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}else{
			$space_list = $this->get_space();
			return view('Admin/advert_add',array(
				'space'=>$space_list
			));
		}
	}

	public function edit(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			$save_data['title'] = !empty($_POST['title']) ? $_POST['title'] : '';
			$save_data['url'] = !empty($_POST['url']) ? $_POST['url'] : '';
			$save_data['space_id'] = !empty($_POST['space_id']) ? $_POST['space_id'] : '';
			$save_data['sort'] = !empty($_POST['sort']) ? $_POST['sort'] : '';
			$save_data['start_time'] = !empty($_POST['start_time']) ? strtotime($_POST['start_time']) : '';
			$save_data['end_time'] = !empty($_POST['end_time']) ? strtotime($_POST['end_time']) : '';
			$save_data['pictrue'] = !empty($_POST['imgname']) ? $_POST['imgname'] : '';
			$result = $this->db->table('v1_advert')->where('id',$id)->update($save_data);
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}else{
			$space_list = $this->get_space();
			$id = $_GET['id'];
			$info = $this->db->table('v1_advert')->where('id',$id)->get()->getRowArray();
			return view('Admin/advert_edit',array(
				'info'=>$info,
				'json_info'=>json_encode(array('0'=>$info['pictrue'],'1'=>$info['id'])),
				'space'=>$space_list
			));
		}
	}

	public function del(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			$result = $this->db->table('v1_advert')->where('id',$id)->update(array('is_delete'=>1));
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}
	}

	public function get_space(){
		$list = $this->db->table('v1_advert_space')->select('id,title')->where(array('is_delete'=>0))->orderBy('id desc')->get()->getResultArray();
		$lists = array();
		if(!empty($list)){
			foreach($list as $key=>$val){
				$lists[$val['id']] = $val['title'];
			}
		}
		return $lists;
	}
}
?>