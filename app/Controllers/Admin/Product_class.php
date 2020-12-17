<?php 
namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Product_class extends AdminController
{
	public function index(){
		if($this->request->isAJAX()){
			$select = "*";
			$where = " is_delete = 0 ";
			$orderby = " sort DESC ";
			$info = $this->db->table('v1_product_class')->select($select)->where($where)->orderBy($orderby)->get()->getResultArray();
			$data = array();
			if(!empty($info)){
				foreach($info as $key=>$val){
					$data[$key]['field0'] = "<label class='pos-rel'><input type='checkbox' class='ace' name='info[id]' value='".$val['id']."'><span class='lbl'></span></label>";
					$data[$key]['field1'] = $val['title'];
					$data[$key]['field2'] = $val['sort'];
					$data[$key]['field3'] = '<td>
						<div class="hidden-sm hidden-xs btn-group">
							<button class="btn btn-xs btn-info">
								<a href="/admin/Product_class/edit?id='.$val['id'].'" style="color:#fff;"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
							</button>
							<button class="btn btn-xs btn-danger" onclick="del('.$val['id'].')">
								<i class="ace-icon fa fa-trash-o bigger-120"></i>
							</button>
						</div>
					</td>';	
				}
			}
			$this->result(0,'success',$data);
		}else{
			$model = new \App\Models\Admin\ProductClassModel;
			$pagesize = !empty($_GET['pagesize']) ? $_GET['pagesize'] : 10;
			$select = "*";
			$where = "is_delete = 0 and pid = 0";
			$orderby = "sort DESC";
			$list = $model->paginate($pagesize,$where);
			$str = "";
			$level = 1;
			foreach($list as $key=>$val){
				$str .= "<tr cate-id=".$val['id']." fid=".$val['pid'].">
			          		<td style='text-align: center;''>
			            		<label class='pos-rel'><input type='checkbox' class='ace' name='info[id]' value=".$val['id']."><span class='lbl'></span></label>
			          		</td>
				            <td style='text-align: left;'>
				            		<span class='x-show fa fa-caret-right' status='false'>".$val['title']."</span>
				            </td>
			            	<td style='text-align: center;'>".$val['sort']."</td>
				            <td class='td-manage' style='text-align: center;'>
				            	<div class='hidden-sm hidden-xs btn-group'>
				            		<button class='btn btn-xs btn-info'>
				            			<a href='/admin/Product_class/edit?id=".$val['id']."' style='color:#fff;'><i class='ace-icon fa fa-pencil bigger-120'></i></a>
				            		</button>
				            		<button class='btn btn-xs btn-danger' onclick='del(".$val['id'].")'>
				            			<i class='ace-icon fa fa-trash-o bigger-120'></i>
				            		</button>
				            	</div>
				            </td>
			        	</tr>"; 
				$string = $this->get_children($val['id'],$str,$level);
			}
			return view('Admin/product_class_list',array(
				'str'=>$string,
				'pager'=>$model->pager
			));
		}
	}

	public function get_children($id,$str,$level){
		$list = $this->db->table('v1_product_class')->where('is_delete = 0 and pid = '.$id)->get()->getResultArray();
		if(!empty($list)){
			$level++;
			foreach($list as $key=>$val){
				$str .= "<tr cate-id=".$val['id']." fid=".$val['pid'].">
			          		<td style='text-align: center;''>
			            		<label class='pos-rel'><input type='checkbox' class='ace' name='info[id]' value=".$val['id']."><span class='lbl'></span></label>
			          		</td>
				            <td style='text-align: left;'>
				            		<span class='x-show' status='false'>".str_repeat('&nbsp;&nbsp;&nbsp;',$level)."<font class='fa fa-caret-right'></font>".$val['title']."</span>
				            </td>
			            	<td style='text-align: center;'>".$val['sort']."</td>
				            <td class='td-manage' style='text-align: center;'>
				            	<div class='hidden-sm hidden-xs btn-group'>
				            		<button class='btn btn-xs btn-info'>
				            			<a href='/admin/Product_class/edit?id=".$val['id']."' style='color:#fff;'><i class='ace-icon fa fa-pencil bigger-120'></i></a>
				            		</button>
				            		<button class='btn btn-xs btn-danger' onclick='del(".$val['id'].")'>
				            			<i class='ace-icon fa fa-trash-o bigger-120'></i>
				            		</button>
				            	</div>
				            </td>
			        	</tr>"; 
			    $str = $this->get_children($val['id'],$str,$level);
			}
		}
		return $str;
	}

	public function add(){
		if($this->request->isAJAX()){
			$save_data['title'] = !empty($_POST['title']) ? $_POST['title'] : '';
			$save_data['pid'] = !empty($_POST['pid']) ? $_POST['pid'] : 0;
			$save_data['sort'] = !empty($_POST['sort']) ? $_POST['sort'] : 1;
			$save_data['create_time'] = time();
			$save_data['create_master'] = $this->master_id;
			$result = $this->db->table('v1_product_class')->insert($save_data);
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}else{
			$class = $this->get_class();
			return view('Admin/product_class_add',array(
				'class'=>$class
			));
		}
	}

	public function edit(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			$save_data['title'] = !empty($_POST['title']) ? $_POST['title'] : '';
			$save_data['pid'] = !empty($_POST['pid']) ? $_POST['pid'] : '';
			$save_data['sort'] = !empty($_POST['sort']) ? $_POST['sort'] : '';
			$result = $this->db->table('v1_product_class')->where('id',$id)->update($save_data);
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}else{
			$id = $_GET['id'];
			$info = $this->db->table('v1_product_class')->where('id',$id)->get()->getRowArray();
			$class = $this->get_class($info['pid']);
			return view('Admin/product_class_edit',array(
				'info'=>$info,
				'class'=>$class
			));
		}
	}

	public function del(){
		if($this->request->isAJAX()){
			$id = $_POST['id'];
			$result = $this->db->table('v1_product_class')->where('id',$id)->update(array('is_delete'=>1));
			if($result){
				return $this->result(0,'success');
			}else{
				return $this->result(1,'fail');
			}
		}
	}

	public function get_class($pid = 0){
		$list = $this->db->table('v1_product_class')->select('id,title')->where('is_delete = 0 and pid = 0')->get()->getResultArray();
		$str = "";
		$level = 1;
		$selected = '';
		foreach($list as $key=>$val){
			if($pid != 0 && $val['id'] == $pid){
				$selected = 'selected';
			}
			$str .= "<option value='".$val['id']."' ".$selected.">".$val['title']."</option>";
			$string = $this->get_child($val['id'],$str,$level,$pid);
		}
		return $string;
	}
	public function get_child($id,$str,$level,$pid){
		$list = $this->db->table('v1_product_class')->select('id,title')->where('is_delete = 0 and pid = '.$id)->get()->getResultArray();
		if(!empty($list)){
			$selected = '';
			$level++;
			foreach($list as $key=>$val){
				if($pid != 0 && $val['id'] == $pid){
					$selected = 'selected';
				}
				$str .= "<option value='".$val['id']."' ".$selected.">".str_repeat('&nbsp;&nbsp;&nbsp;',$level)."|".str_repeat('-',$level).$val['title']."</option>";
				$str = $this->get_child($val['id'],$str,$level,$pid);
			}
		}
		return $str;
	}


}
?>