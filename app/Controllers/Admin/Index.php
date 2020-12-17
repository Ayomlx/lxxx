<?php 
namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Index extends AdminController
{
	public function index()
	{
		$data['banner'] = $this->db->table('v1_banner')->where('is_delete = 0')->countAllResults();
		$data['product'] = $this->db->table('v1_product')->where('is_delete = 0')->countAllResults();
		$data['new'] = $this->db->table('v1_new')->where('is_delete = 0')->countAllResults();
		$data['advert'] = $this->db->table('v1_advert')->where('is_delete = 0')->countAllResults();
		$data['member'] = $this->db->table('v1_member')->where('is_delete = 0')->countAllResults();
		return view('Admin/index',array(
			'data'=>$data,
			'web_info'=>$this->web_info
		));
	}
	public function edit_file(){
		$file_name = $_POST['name'];
		$val = $_POST['value'];
		$save_data = array($file_name=>$val);
		$result = $this->db->table('v1_web_setting')->where('id = 1')->update($save_data);
		return $this->result(0,'success');
	}
}
