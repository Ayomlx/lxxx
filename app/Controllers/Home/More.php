<?php 
namespace App\Controllers\Home;

use App\Controllers\HomeController;

class More extends HomeController
{
	public function index()
	{
		$id = !empty($_GET['id']) ? $_GET['id'] : 0;
		$pagesize = 8;
		$page = max(1,$_GET['page']);
		$start_page = ($page-1) * $pagesize;

		$product_class = $this->db->table('v1_product_class')->where("is_delete = 0 and pid = ".$id)->get()->getResultArray();
		$class_ids = array();
		if(!empty($product_class)){
			foreach($product_class as $key=>$val){
				$class_ids[] = $val['id'];
			}
		}
		$_class_ids = implode(',', $class_ids);
		$where = "is_delete = 0";
		if(!empty($class_ids)){
			$where .= " and class_id in(".$_class_ids.")";
		}
		$product = $this->db->table('v1_product')->where($where)->limit($start_page,$pagesize)->get()->getResultArray();
		$total = $this->db->table('v1_product')->where($where)->countAllResults();
		
		$page = ceil($total/$pagesize);

		return view('Home/more',array(
			'product'=>$product,
			'product_class'=>$product_class,
			'web_info'=>$this->get_web_setting(),
			'page'=>$page,
			'total'=>$total
		));
	}

	public function more(){
		$pagesize = 8;
		$page = max(1,$_GET['page']);
		$start_page = ($page-1) * $pagesize;
		$id = !empty($_GET['id']) ? $_GET['id'] : 0;
		$class_info = $this->db->table('v1_product_class')->where("id = ".$id)->get()->getRowArray();
		$product_class = $this->db->table('v1_product_class')->where("is_delete = 0 and pid = ".$class_info['pid'])->get()->getResultArray();

		$where = "is_delete = 0";
		if(!empty($id)){
			$where .= " and class_id =".$id;
		}
		$product = $this->db->table('v1_product')->where($where)->limit($start_page,$pagesize)->get()->getResultArray();

		$total = $this->db->table('v1_product')->where($where)->countAllResults();

		$page = ceil($total/$pagesize);

		return view('Home/more',array(
			'product'=>$product,
			'product_class'=>$product_class,
			'web_info'=>$this->get_web_setting(),
			'page'=>$page,
			'total'=>$total
		));
	}


}
