<?php 
namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Account extends AdminController
{
	public function index()
	{
		if($this->request->isAJAX()){
			$order = "id DESC";
			$info = $this->db->table('v1_admin')->where("is_delete = 0 and username != 'admin'")->orderBy($order)->get()->getResultArray();
			$data = array();
			if(!empty($info)){
				foreach($info as $key=>$val){
					$data[$key]['field0'] = "<label class='pos-rel'><input type='checkbox' class='ace' name='info[id]' value='".$val['id']."'><span class='lbl'></span></label>";
					$data[$key]['field1'] = $val['nickname'];
					$data[$key]['field2'] = $val['username'];
					$data[$key]['field3'] = $this->Get_sex($val['sex']);
					$data[$key]['field4'] = $val['phone'];
					$data[$key]['field5'] = '<td>
						<div class="hidden-sm hidden-xs btn-group">
							<button class="btn btn-xs btn-info">
								<a href="/Admin/Account/edit?id='.$val['id'].'" style="color:#fff;"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
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
			return view('Admin/account_list');
		}
	}
	public function add(){
		if($this->request->isAJAX()){
			$username = !empty($_POST['username']) ? $_POST['username'] : '';
			$password = !empty($_POST['password']) ? $_POST['password'] : '';
			$repassword = !empty($_POST['repassword']) ? $_POST['repassword'] : '';
			$nickname = !empty($_POST['nickname']) ? $_POST['nickname'] : '';
			$sex = !empty($_POST['sex']) ? $_POST['sex'] : '';
			$phone = !empty($_POST['phone']) ? $_POST['phone'] : '';
			$group_id = !empty($_POST['group_id']) ? $_POST['group_id'] : '';
			if($password != $repassword){
				return $this->result(1,'两次输入的密码不一致！');
			}
			$salf = $this->salf();
			$save_data = array(
				'username'=>$username,
				'password'=>substr(md5(md5($password).$salf),0,16),
				'salf'=>$salf,
				'nickname'=>$nickname,
				'sex'=>$sex,
				'phone'=>$phone,
				'group_id'=>$group_id,
				'create_time'=>time(),
				'is_delete'=>0,
				'create_master'=>$this->master_id
			);
			$result = $this->db->table('v1_admin')->insert($save_data);
			if($result){
				$this->result(0,'success');
			}else{
				$this->result(1,'fail');
			}
		}else{
			$auth_list = $this->get_authority();
			return view('Admin/account_add',array(
				'Controller'=>$this->Controllername,
				'auth_list'=>$auth_list
			));	
		}
	}

	public function check_username(){
		if($this->request->isAJAX()){
			$username = $_POST['username'];
			$info = $this->db->table('v1_admin')->where("username = ".$username)->get()->getRowArray();
			if(!empty($info)){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}else{
			return $this->result(1,'fail');
		}
	}

	public function check_nickname(){
		if($this->request->isAJAX()){
			$nickname = $_POST['nickname'];
			$info = $this->db->table('v1_admin')->where("nickname = ".$nickname)->get()->getRowArray();
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
			$password = !empty($_POST['password']) ? $_POST['password'] : '';
			$repassword = !empty($_POST['repassword']) ? $_POST['repassword'] : '';
			$nickname = !empty($_POST['nickname']) ? $_POST['nickname'] : '';
			$sex = !empty($_POST['sex']) ? $_POST['sex'] : '';
			$phone = !empty($_POST['phone']) ? $_POST['phone'] : '';
			$group_id = !empty($_POST['group_id']) ? $_POST['group_id'] : '';
			$save_data = array(
				'nickname'=>$nickname,
				'sex'=>$sex,
				'phone'=>$phone,
				'group_id'=>$group_id,
				'is_delete'=>0
			);
			if(!empty($password) && !empty($repassword)){
				if($password != $repassword){
					$this->result(1,'两次密码不一致');
				}
				$salf = $this->salf();
				$save_data['password'] = substr(md5(md5($password).$salf),0,16);
				$save_data['salf'] = $salf;
			}
			$result = $this->db->table('v1_admin')->where('id',$id)->update($save_data);
			if($result){
				$this->result(0,'success');
			}else{
				$this->result(1,'fail');
			}
		}else{
			$id = $_GET['id'];
			$info = $this->db->table('v1_admin')->where("id = ".$id)->get()->getRowArray();
			$auth_list = $this->get_authority();
			return view('Admin/account_edit',array(
				'info'=>$info,
				'Controller'=>$this->Controllername,
				'auth_list'=>$auth_list
			));
		}
	}

	public function del(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			if(empty($id)){
				return $this->result(1,'参数错误');
			}
			$result = $this->db->table('v1_admin')->where('id',$id)->update(array('is_delete'=>1));
			if($result){
				$this->result(0,'success');
			}else{
				$this->result(1,'fail');
			}
		}else{
			return $this->result(1,'fail');
		}
	}

	public function get_authority(){
		$list = $this->db->table('v1_admin_group')->select('id,name')->where("is_delete = 0")->get()->getResultArray();
		return $list;
	}

}
