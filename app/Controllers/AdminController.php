<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class AdminController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['common_helper'];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);
		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		$this->router = \Config\Services::router();
		$this->session = \Config\Services::session();
		$this->pager = \Config\Services::pager();
		$this->db = \Config\Database::connect();  //建立数据库连接
		$this->cache = \Config\Services::cache(); //加载缓存
		//--------------------------------------------------------------------
		$this->check_login();  //验证是否登录
		// E.g.:
		$this->Controllername = $this->Get_Controller_Name(); //当前请求的控制器名称
		$this->Methodname = $this->router->methodName();	//当前请求的方法名称
		$this->master = $_SESSION['Admin_info']['username']; //登录的管理员用户名
		$this->master_id = $_SESSION['Admin_info']['id'];	//登录的管理员用户ID
		$this->web_info = $this->get_web_setting();
		$this->menu = CF('menu','',CONFIG_PATH);
		//控制器列表
		$this->controller_array = CF('controller_array','',CONFIG_PATH);
		$this->controller = $this->getcontroller($this->Controllername);
		//方法列表
		$this->method_array = array(
			'index'=>$this->controller['title'] != '首页' ? $this->controller['title'].'列表' : '',
			'add'=>$this->controller['title'].'添加',
			'edit'=>$this->controller['title'].'修改',
			'setting'=>$this->controller['title'].'配置',
		);
		$this->method = $this->getmethod($this->Methodname);
		if($_SESSION['Admin_info']['id'] != 1){
			$this->check_auth();
		}
		$this->write_log();
		return view('Admin/header',array(
			'Controllername'=>$this->Controllername,
			'Methodname'=>$this->Methodname,
			'web_info'=>$this->web_info,
			'controller'=>$this->controller['title'],
			'controller_url'=>$this->controller['url'],
			'method'=>$this->method,
			'menu'=>$this->menu,
			'admin_auth'=>$this->get_admin_auth(1)
		));
	}

	public function result($code = 0, $message = 'success', $data = ""){
		$result = array(
			'code' => $code,
			'msg' => $message,
			'data' => $data
		);
		echo json_encode($result);
	}

	public function check_login(){
		$info = !empty($_SESSION['Admin_info']) ? $_SESSION['Admin_info'] : '';
		if(empty($info)){
			echo "<script type='text/javascript'>window.location.href='/admin/login'</script>";
			exit;
		}
	}

	public function check_auth(){
		$url = $this->Controllername.'/'.$this->Methodname;
		$auth = $this->get_admin_auth(2);
		if(empty($auth[$this->Controllername]) || !in_array($url,$auth[$this->Controllername])){
			echo "<script type='text/javascript'>alert('没有权限');window.history.go(-1);</script>";
			exit;
		}
	}

	/*生成随机字符串*/
	public function salf($length = 4){
		$str = '0123456789';
		$_str = '';
		for($i=0;$i<$length;$i++){
			$_str .= substr(str_shuffle($str),0,1);
		}
		return $_str;
	}
	/*获取管理员*/
	protected function init_account(){
		$info = $this->db->table('v1_admin')->select('id,username')->get()->getResultArray();
		$account = array();
		if(!empty($info)){
			foreach ($info as $key => $value) {
				$account[$value['id']] = $value['username'];
			}
		}
		return $account;
	}
	/*获取新闻分类*/
	protected function init_class(){
		$class = $this->db->table('v1_news_class')->select('id,name')->where('is_delete = 0')->get()->getResultArray();
		$array = array();
		if(!empty($class)){
			foreach($class as $key=>$val){
				$array[$val['id']] = $val['name'];
			}
		}
		return $array;
	}
	//获取当前控制器名称
	public function Get_Controller_Name(){
		$str = $this->router->controllerName();
		$array = explode('\\', $str);
		return $array[4];
	}
	//获取性别
	public function Get_sex($sex){
		switch ($sex) {
			case 1:
				$result = '男';
				break;
			case 2:
				$result = '女';
				break;
			default:
				$result = '-';
				break;
		}
		return $result;
	}
	//获取网站配置
	public function get_web_setting(){
		$info = $this->db->table('v1_web_setting')->where('id = 1')->get()->getRowArray();
		return $info;
	}
	//获取导航条
	public function getcontroller($controller_name = ''){
		$controller_name = strtolower($controller_name);
		return !empty($this->controller_array[$controller_name]) ? $this->controller_array[$controller_name] : '';
	}

	public function getmethod($method_name = ''){
		$method_name = strtolower($method_name);
		return !empty($this->method_array[$method_name]) ? $this->method_array[$method_name] : '';
	}

	public function get_admin_auth($type = 1){
		$admin_id = $_SESSION['Admin_info']['id'];
		$info = $this->db->table('v1_admin')->select('v1_admin_auth.authority')->join('v1_admin_auth','v1_admin_auth.group_id = v1_admin.group_id','left')->where('v1_admin.id',$admin_id)->get()->getRowArray();
		$auth = !empty($info['authority']) ? json_decode($info['authority'],true) : array();
		$_auth = array();
		if(!empty($auth)){
			foreach($auth as $key=>$val){
				$_auth[] = $key;
			}
		}
		if($type == 1){
			return $_auth;
		}else{
			return $auth;
		}
		
	}
	public function write_log(){
		if($this->request->isAJAX() && $this->Methodname != 'index'){
			$save_data = array(
				'url'=>$this->Controllername.'/'.$this->Methodname,
				'content'=>json_encode(array("GET"=>$_GET,"POST"=>$_POST)),
				'type'=>1,
				'create_master'=>$this->master_id,
				'create_time'=>time()
			);
			$this->db->table('v1_log')->insert($save_data);
		}
	}
}
