<?php 
namespace App\Models\Admin;

use CodeIgniter\Model;

/**
 * 
 */
class NewsClassModel extends Model
{
	public function __construct(){
		$this->table = 'v1_news_class';
		$this->tempReturnType = 'array';
	}
	
}
 ?>