<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

/**
 * 
 */
class ProductClassModel extends Model
{
	public function __construct(){
		$this->table = 'v1_product_class';
		$this->tempReturnType = 'array';
	}

}
 ?>