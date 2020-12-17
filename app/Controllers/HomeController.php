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

class HomeController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	public $puri = 'en';
	public $_lang = '';

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
		$this->db = \Config\Database::connect();  //建立数据库连接
		//-------------------------------------------------------------------
		/*$agent = $this->request->getUserAgent();
		if($agent->isMobile()){
			
		}*/
		/*$this->puri = 'en';
		if (!empty ($this->_lang) && $this->_lang == 'chinese') {
			$this->puri = 'cn';
			$url = str_replace('/cn/', '/en/', $_SERVER['REQUEST_URI']);
		} else if(!empty ($this->_lang) && $this->_lang == 'english') {
			$this->puri = 'en';
			$is_lang = stripos($_SERVER['REQUEST_URI'], '/en/');
			if ($is_lang == 0 && $is_lang !== false) {
				$url = preg_replace('/\/en\//i', '/cn/', $_SERVER['REQUEST_URI']);
			} else {
				$url = '/cn' . $_SERVER['REQUEST_URI'];
			}
		}*/
		// E.g.:
		$web_info = $this->get_web_setting();
		if($web_info['web_is_close'] == 1){
			$this->display404errors();
		}
	}

	public function result($code = 0, $message = 'success', $data = ""){
		$result = array(
			'code' => $code,
			'msg' => $message,
			'data' => $data
		);
		echo json_encode($result);
	}
	//获取网站配置
	public function get_web_setting(){
		$info = $this->db->table('v1_web_setting')->where('id = 1')->get()->getRowArray();
		return $info;
	}
}
