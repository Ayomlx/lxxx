<?php 
namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Advert_Space extends AdminController
{
	public function index(){
		if($this->request->isAJAX()){
			$select = "*";
			$where = " is_delete = 0 ";
			$orderby = " id DESC ";
			$info = $this->db->table('v1_advert_space')->select($select)->where($where)->orderBy($orderby)->get()->getResultArray();
			$data = array();
			if(!empty($info)){
				foreach($info as $key=>$val){
					$data[$key]['field0'] = "<label class='pos-rel'><input type='checkbox' class='ace' name='id' value='".$val['id']."'><span class='lbl'></span></label>";
					$data[$key]['field1'] = $val['title'];
					$data[$key]['field2'] = $val['width'].'(px)*'.$val['height']."(px)";
					$data[$key]['field3'] = !empty($val['create_time']) ? date('Y-m-d H:i:s',$val['create_time']) : '';
					$data[$key]['field4'] = '<td>
						<div class="hidden-sm hidden-xs btn-group">
							<button class="btn btn-xs btn-info">
								<a href="/Admin/Advert_Space/edit?id='.$val['id'].'" style="color:#fff;"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
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
			return view('Admin/advert_space_list');
		}
	}
	public function add(){
		if($this->request->isAJAX()){
			$save_data = array();
			$save_data['title'] = !empty($_POST['title']) ? $_POST['title'] : '';
			$save_data['width'] = !empty($_POST['width']) ? $_POST['width'] : '';
			$save_data['height'] = !empty($_POST['height']) ? $_POST['height'] : '';
			$save_data['create_time'] = time();
			$save_data['create_master'] = $this->master_id;
			$result = $this->db->table('v1_advert_space')->insert($save_data);
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}else{
			return view('Admin/advert_space_add');
		}
	}
	public function edit(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			$save_data['title'] = !empty($_POST['title']) ? $_POST['title'] : '';
			$save_data['width'] = !empty($_POST['width']) ? $_POST['width'] : '';
			$save_data['height'] = !empty($_POST['height']) ? $_POST['height'] : '';
			$result = $this->db->table('v1_advert_space')->where('id',$id)->update($save_data);
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}else{
			$id = $_GET['id'];
			$info = $this->db->table('v1_advert_space')->where('id',$id)->get()->getRowArray();
			return view('Admin/advert_space_edit',array(
				'info'=>$info
			));
		}
	}
	public function del(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			if(empty($id)){
				return $this->result(1,'参数错误');
			}
			$result = $this->db->table('v1_advert_space')->where('id',$id)->update(array('is_delete'=>1));
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}
	}
}
?>