<?php 
namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Setting extends AdminController
{
	public function index()
	{
		$info = $this->get_setting_info();
		return view('Admin/setting_index',array(
			'info'=>$info,
			'json_info'=>json_encode(array('0'=>$info['web_logo'],'1'=>$info['id'])),
			'qr_json_info'=>json_encode(array('0'=>$info['web_qrcode'],'1'=>$info['id'])),
		));
	}

	public function save(){
		if($this->request->isAJAX()){
			$info = $this->get_setting_info();
			$save_data = array();
			$save_data['web_name'] = !empty($_POST['web_name']) ? $_POST['web_name'] : '';
			$save_data['web_title'] = !empty($_POST['web_title']) ? $_POST['web_title'] : '';
			$save_data['web_logo'] = !empty($_POST['imgname']) ? $_POST['imgname'] : '';
			$save_data['web_qrcode'] = !empty($_POST['qrcode_name']) ? $_POST['qrcode_name'] : '';
			$save_data['company_name'] = !empty($_POST['company_name']) ? $_POST['company_name'] : '';
			$save_data['company_address'] = !empty($_POST['company_address']) ? $_POST['company_address'] : '';
			$save_data['web_keywords'] = !empty($_POST['web_keywords']) ? $_POST['web_keywords'] : '';
			$save_data['web_description'] = !empty($_POST['web_description']) ? $_POST['web_description'] : '';
			$save_data['web_copyright'] = !empty($_POST['web_copyright']) ? $_POST['web_copyright'] : '';
			$save_data['web_record'] = !empty($_POST['web_record']) ? $_POST['web_record'] : '';
			$save_data['web_tel'] = !empty($_POST['web_tel']) ? $_POST['web_tel'] : '';
			$save_data['web_email'] = !empty($_POST['web_email']) ? $_POST['web_email'] : '';
			$save_data['web_qq'] = !empty($_POST['web_qq']) ? $_POST['web_qq'] : '';
			$save_data['web_is_close'] = !empty($_POST['web_is_close']) && $_POST['web_is_close'] == 'on' ? 1 : 0;
			$save_data['web_close_tips'] = !empty($_POST['web_close_tips']) ? $_POST['web_close_tips'] : '';
			if(!empty($info)){
				$result = $this->db->table('v1_web_setting')->where('id',1)->update($save_data);
			}else{
				$result = $this->db->table('v1_web_setting')->insert($save_data);	
			}
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}
	}

	public function get_setting_info(){
		$sql = "SELECT * FROM v1_web_setting WHERE id = 1";
		$info = $this->db->query($sql)->getRowArray();
		return $info;
	}
}
