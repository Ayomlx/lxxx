<?php 
namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Links extends AdminController
{

	public function index()
	{
		if($this->request->isAJAX()){
			$select = '*';
			$where = " is_delete = 0 ";
			$orderby = " sort DESC";
			$info = $this->db->table('v1_links')->select($select)->where($where)->orderBy($orderby)->get()->getResultArray();
			$data = array();
			if(!empty($info)){
				foreach($info as $key=>$val){
					$data[$key]['field0'] = "<label class='pos-rel'><input type='checkbox' class='ace' name='id' value='".$val['id']."'><span class='lbl'></span></label>";
					$data[$key]['field1'] = $val['title'];
					$data[$key]['field2'] = $val['url'];
					$data[$key]['field3'] = "<a href='".$val['logo']."' data-rel='colorbox' class='cboxElement' target='_blank'><img src='".$val['logo']."' width='100'></a>";
					$data[$key]['field4'] = $val['sort'];
					$data[$key]['field5'] = !empty($val['create_time']) ? date('Y-m-d H:i:s',$val['create_time']) : '';
					$data[$key]['field6'] = '<td>
						<div class="hidden-sm hidden-xs btn-group">
							<button class="btn btn-xs btn-info">
								<a href="/Admin/Links/edit?id='.$val['id'].'" style="color:#fff;"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
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
			return view('Admin/links_list');	
		}
	}
	public function add(){
		if($this->request->isAJAX()){
			$save_data = array();
			$save_data['title'] = !empty($_POST['title']) ? $_POST['title'] : '';
			$save_data['url'] = !empty($_POST['url']) ? $_POST['url'] : '';
			$save_data['sort'] = !empty($_POST['sort']) ? $_POST['sort'] : 1; 
			$save_data['logo'] = !empty($_POST['imgname']) ? $_POST['imgname'] : '';
			$save_data['create_time'] = time();
			$save_data['create_master'] = $this->master_id;
			$result = $this->db->table('v1_links')->insert($save_data);
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}else{
			return view('Admin/links_add');
		}
	}

	public function edit(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			$save_data = array();
			$save_data['title'] = !empty($_POST['title']) ? $_POST['title'] : '';
			$save_data['url'] = !empty($_POST['url']) ? $_POST['url'] : '';
			$save_data['sort'] = !empty($_POST['sort']) ? $_POST['sort'] : 1; 
			$save_data['logo'] = !empty($_POST['imgname']) ? $_POST['imgname'] : '';
			$result = $this->db->table('v1_links')->where('id',$id)->update($save_data);
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}else{
			$id = $_GET['id'];
			$info = $this->db->table('v1_links')->where(array('id'=>$id))->get()->getRowArray();
			return view('Admin/links_edit',array(
				'info'=>$info,
				'json_info'=>json_encode(array('0'=>$info['logo'],'1'=>$info['id']))
			));
		}
	}

	public function del(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			if(empty($id)){
				return $this->result(1,'参数错误！');
			}
			$result = $this->db->table('v1_links')->where('id',$id)->update(array('is_delete'=>1));
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}else{
			return $this->result(1,'错误');
		}
	}
}
