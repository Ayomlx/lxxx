<?php 
namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Login extends BaseController
{

	public function index()
	{
		return view('Admin/login');
	}
	public function dologin(){

		$db = \Config\Database::connect(); //建立数据库连接

		$username = $_POST['username'];
		$password = $_POST['password'];
		if(empty($username)){
			return $this->result(1,'用户名不能为空！');
		}
		if(empty($password)){
			return $this->result(1,'密码不能为空！');
		}
		$sql = "select * from v1_admin where username='".$username."' and is_delete = 0";
		$info = $db->query($sql)->getRowArray();
		if(!empty($info)){
			if($info['password'] == substr(md5(md5($password).$info['salf']),0,16)){
				$this->session->set('Admin_info',$info);
				return $this->result(0,'登录成功！');
			}else{
				return $this->result(1,'登录失败！');
			}
		}else{
			return $this->result(1,'登录失败！');
		}
	}
	public function dologout(){
		$this->session->remove('Admin_info');
		return $this->result(0,'退出成功！');
	}

}
