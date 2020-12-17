<?php 
namespace App\Controllers;

use App\Controllers\HomeController;

class Index extends HomeController
{
	public function index()
	{
		$banner_list = array();
		//page_Banner
		$banner_list['page1'] = $this->db->table('v1_banner')->where('space_id = 1 and is_delete = 0')->orderBy('sort asc')->get()->getResultArray();
		$banner_list['page2'] = $this->db->table('v1_banner')->where('space_id = 2 and is_delete = 0')->orderBy('sort asc')->get()->getResultArray();
		$banner_list['page3'] = $this->db->table('v1_banner')->where('space_id = 3 and is_delete = 0')->orderBy('sort asc')->get()->getResultArray();
		$banner_list['page4'] = $this->db->table('v1_banner')->where('space_id = 4 and is_delete = 0')->orderBy('sort asc')->get()->getResultArray();
		$banner_list['page5'] = $this->db->table('v1_banner')->where('space_id = 5 and is_delete = 0')->orderBy('sort asc')->get()->getResultArray();
		$banner_list['page6'] = $this->db->table('v1_banner')->where('space_id = 6 and is_delete = 0')->orderBy('sort asc')->get()->getResultArray();
		//wap_page_banner
		$wap_banner_list = array();
		$wap_banner_list['page1'] = $this->db->table('v1_banner')->where('space_id = 7 and is_delete = 0')->orderBy('sort asc')->get()->getResultArray();
		$wap_banner_list['page2'] = $this->db->table('v1_banner')->where('space_id = 8 and is_delete = 0')->orderBy('sort asc')->get()->getResultArray();
		$wap_banner_list['page3'] = $this->db->table('v1_banner')->where('space_id = 9 and is_delete = 0')->orderBy('sort asc')->get()->getResultArray();
		$wap_banner_list['page4'] = $this->db->table('v1_banner')->where('space_id = 10 and is_delete = 0')->orderBy('sort asc')->get()->getResultArray();
		$wap_banner_list['page5'] = $this->db->table('v1_banner')->where('space_id = 11 and is_delete = 0')->orderBy('sort asc')->get()->getResultArray();
		$wap_banner_list['page6'] = $this->db->table('v1_banner')->where('space_id = 12 and is_delete = 0')->orderBy('sort asc')->get()->getResultArray();
		//NEWS
		$news_list = $this->db->table('v1_new')->where('class_id in (2) and is_delete = 0')->get()->getResultArray();

		//Product
		$product_list = $this->db->table('v1_product')->where('is_delete = 0 and class_id = 5')->limit(0,8)->orderBy('sort asc')->get()->getResultArray();

		//Case
		$case_list = $this->db->table('v1_product')->where('is_delete = 0 and class_id = 1')->limit(0,3)->get()->getResultArray();

		//Technology
		$technology_list = $this->db->table('v1_product')->where('is_delete = 0 and class_id = 6')->limit(0,3)->get()->getResultArray();

		//Pages
		$pages_list = $this->db->table('v1_pages')->where('is_delete = 0 and id in (1,2)')->get()->getResultArray();
		
		return view('Home/index',array(
			'banner_info'=>$banner_list,
			'wap_banner_info'=>$wap_banner_list,
			'news_info'=>$news_list,
			'product_list'=>$product_list,
			'case_list'=>$case_list,
			'technology_list'=>$technology_list,
			'pages_list'=>$pages_list,
			'web_info'=>$this->get_web_setting()
		));
	}

}
