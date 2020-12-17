<?php 
namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Pages extends AdminController
{
	public function index()
	{
		if($this->request->isAJAX()){
			$where = "is_delete = 0";
			$order = " order by sort DESC";
			$sql = "SELECT * FROM v1_pages WHERE ".$where.$order;
			$info = $this->db->query($sql)->getResultArray();
			$data = array();
			if(!empty($info)){
				foreach($info as $key=>$val){
					$data[$key]['field0'] = "<label class='pos-rel'><input type='checkbox' class='ace' name='info[id]' value='".$val['id']."'><span class='lbl'></span></label>";
					$data[$key]['field1'] = $val['title'];
					$data[$key]['field2'] = $val['sort'];
					$data[$key]['field3'] = '<td>
						<div class="hidden-sm hidden-xs btn-group">
							<button class="btn btn-xs btn-info">
								<a href="/admin/Pages/edit?id='.$val['id'].'" style="color:#fff;"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
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
			return view('Admin/pages_list');
		}
	}

	public function add(){
		if($this->request->isAJAX()){
			$title = !empty($_POST['title']) ? $_POST['title'] : '';
			$pictrue = !empty($_POST['imgname']) ? $_POST['imgname'] : '';
			$content = !empty($_POST['content']) ? $_POST['content'] : '';
			$sort = !empty($_POST['sort']) ? $_POST['sort'] : 1;
			$save_data = array(
				'title'=>$title,
				'pictrue'=>$pictrue,
				'content'=>$content,
				'sort'=>$sort,
				'create_time'=>time(),
				'create_master'=>$this->master_id
			);
			$result = $this->db->table('v1_pages')->insert($save_data);
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}else{ 
			return view('Admin/pages_add');
		}
	}

	public function edit(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			if(empty($id)){
				return $this->result(1,'参数错误');
			}
			$title = !empty($_POST['title']) ? $_POST['title'] : '';
			$pictrue = !empty($_POST['imgname']) ? $_POST['imgname'] : '';
			$content = !empty($_POST['content']) ? $_POST['content'] : '';
			$sort = !empty($_POST['sort']) ? $_POST['sort'] : 1;
			$save_data = array(
				'title'=>$title,
				'pictrue'=>$pictrue,
				'content'=>htmlspecialchars($content),
				'sort'=>$sort
			);
			$result = $this->db->table('v1_pages')->where('id',$id)->update($save_data);
			if($result){
				$this->result(0,'success');
			}else{
				$this->result(1,'fail');
			}
		}else{
			$id = $_GET['id'];
			$sql = "SELECT * FROM v1_pages WHERE id = " . $id;
			$info = $this->db->query($sql)->getRowArray();
			return view('Admin/pages_edit',array(
				'info' => $info,
				'json_info'=>json_encode(array('0'=>$info['pictrue'],'1'=>$info['id'])),
			));
		}
	}

	public function del(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			if(empty($id)){
				return $this->result(1,'参数错误');
			}
			$result = $this->db->table('v1_pages')->where('id',$id)->update(array('is_delete'=>1));
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');			
			}
		}	
	}
}
