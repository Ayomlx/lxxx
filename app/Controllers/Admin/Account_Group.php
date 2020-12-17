<?php 
namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Account_Group extends AdminController
{
	public function index()
	{
		if($this->request->isAJAX()){
			$order = "sort DESC";
			$info = $this->db->table('v1_admin_group')->where('is_delete = 0')->orderBy($order)->get()->getResultArray();
			$data = array();
			if(!empty($info)){
				foreach($info as $key=>$val){
					$data[$key]['field0'] = "<label class='pos-rel'><input type='checkbox' class='ace' name='info[id]' value='".$val['id']."'><span class='lbl'></span></label>";
					$data[$key]['field1'] = $val['name'];
					$data[$key]['field2'] = $val['sort'];
					$data[$key]['field3'] = !empty($val['create_time']) ? date('Y-m-d H:i:s',$val['create_time']) : '' ;
					$data[$key]['field4'] = '<td>
						<div class="hidden-sm hidden-xs btn-group">

							<button class="btn btn-xs btn-info">
								<a href="/Admin/Account_Group/edit?id='.$val['id'].'" style="color:#fff;"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
							</button>
							<button class="btn btn-xs btn-warning">
								<a href="/Admin/Account_Group/setting?id='.$val['id'].'" style="color:#fff;"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></a>
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
			return view('Admin/account_group_list');
		}
	}
	public function add(){
		if($this->request->isAJAX()){
			$name = !empty($_POST['name']) ? $_POST['name'] : '';
			$sort = !empty($_POST['sort']) ? $_POST['sort'] : '';
			$save_data = array(
				'name'=>$name,
				'sort'=>$sort,
				'create_time'=>time(),
				'is_delete'=>0,
				'create_master'=>$this->master_id
			);
			$result = $this->db->table('v1_admin_group')->insert($save_data);
			if($result){
				$this->result(0,'success');
			}else{
				$this->result(1,'fail');
			}
		}else{
			return view('Admin/account_group_add',array(
				'Controller'=>$this->Controllername
			));	
		}
	}

	public function check_username(){
		if($this->request->isAJAX()){
			$name = $_POST['username'];
			$info = $this->db->table('v1_admin_group')->where("name = ".$name)->get()->getRowArray();
			if(!empty($info)){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}else{
			return $this->result(1,'fail');
		}
	}

	public function edit(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			$name = !empty($_POST['name']) ? $_POST['name'] : '';
			$sort = !empty($_POST['sort']) ? $_POST['sort'] : '';
			$save_data = array(
				'name'=>$name,
				'sort'=>$sort
			);
			$result = $this->db->table('v1_admin_group')->where('id',$id)->update($save_data);
			if($result){
				$this->result(0,'success');
			}else{
				$this->result(1,'fail');
			}
		}else{
			$id = $_GET['id'];
			$info = $this->db->table('v1_admin_group')->where('id = '.$id)->get()->getRowArray();
			return view('Admin/account_group_edit',array(
				'info'=>$info,
				'Controller'=>$this->Controllername
			));
		}
	}

	public function del(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			if(empty($id)){
				return $this->result(1,'参数错误');
			}
			$result = $this->db->table('v1_admin_group')->where('id',$id)->update(array('is_delete'=>1));
			if($result){
				$this->result(0,'success');
			}else{
				$this->result(1,'fail');
			}
		}else{
			return $this->result(1,'fail');
		}
	}

	public function setting(){
		
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			$info = $this->get_auth($id);
			$data = !empty($_POST['data']) ? $_POST['data'] : array();
			$save_data = array(
				'group_id'=>$id,
				'authority'=>json_encode($data)
			);
			if(!empty($info)){
				$result = $this->db->table('v1_admin_auth')->where('group_id',$id)->update($save_data);
			}else{
				$result = $this->db->table('v1_admin_auth')->insert($save_data);
			}
			
			return $this->result(0,'success');
		}else{
			$id = $_GET['id'];
			$info = $this->get_auth($id);
			$auth = CF('auth','',CONFIG_PATH);
			return view('admin/account_group_setting',array(
				'id'=>$id,
				'info'=>!empty($info['authority']) ? json_decode($info['authority'],true) : array(),
				'auth'=>$auth
			));
		}
	}

	public function get_auth($group_id){
		$info = $this->db->table('v1_admin_auth')->where("group_id",$group_id)->get()->getRowArray();
		return $info;
	}
}
