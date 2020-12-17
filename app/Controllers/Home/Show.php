<?php 
namespace App\Controllers\Home;

use App\Controllers\HomeController;

class Show extends HomeController
{
	public function case_show()
	{
		$id = $_GET['id'];
		$info = $this->db->table('v1_product')->where('id',$id)->get()->getRowArray();
		return view('Home/show',array(
			'info'=>$info,
			'class_list'=>$this->get_product_class(),
			'web_info'=>$this->get_web_setting()
		));
	}

	public function product_show(){
		$id = $_GET['id'];
		$info = $this->db->table('v1_product')->where('id',$id)->get()->getRowArray();
		return view('Home/show',array(
			'info'=>$info,
			'class_list'=>$this->get_product_class(),
			'web_info'=>$this->get_web_setting()
		));
	}

	public function get_product_class(){
		$class_list = $this->db->table('v1_product_class')->where('is_delete = 0')->get()->getResultArray();
		$_class_list = array();
		if(!empty($class_list)){
			foreach($class_list as $val){
				$_class_list[$val['id']] = $val['title'];
			}
		}
		return $_class_list;
	}
}
