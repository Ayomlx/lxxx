<?php 
namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Logs extends AdminController
{
	public function index(){
		$logs_type = CF('logs_type','',CONFIG_PATH);
		if($this->request->isAJAX()){
			$order = "v1_log.create_time DESC";
			$info = $this->db->table('v1_log')->select('v1_log.*,v1_admin.username')->join('v1_admin','v1_admin.id = v1_log.create_master','left')->orderBy($order)->get()->getResultArray();

			$data = array();
			if(!empty($info)){
				foreach($info as $key=>$val){
					$data[$key]['field0'] = $val['id'];
					$data[$key]['field1'] = $val['url'];
					$data[$key]['field2'] = $logs_type[$val['type']];
					$data[$key]['field3'] = $val['username'];
					$data[$key]['field4'] = !empty($val['create_time']) ? date('Y-m-d H:i:s',$val['create_time']) : '' ;
					$data[$key]['field5'] = '<td>
						<div class="hidden-sm hidden-xs btn-group">
							<button class="btn btn-xs btn-info">
								<a href="/Admin/Logs/show?id='.$val['id'].'" style="color:#fff;"><i class="ace-icon fa fa-eye bigger-120"></i></a>
							</button>
						</div>
					</td>';
				}
			}
			$this->result('0','success',$data);
		}else{
			return view('Admin/logs_list');
		}
	}

	public function show(){
		$id = $_GET['id'];
		$info = $this->db->table('v1_log')->where('id',$id)->get()->getRowArray();
		return view('Admin/logs_show',array(
			'info'=>$info
		));
	}
}
?>