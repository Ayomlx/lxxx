<?php namespace App\Controllers;

class Upload extends BaseController
{
	public function Upload()
	{
		if($this->request->isAJAX()){
			$type = !empty($_GET['type']) ? $_GET['type'] : '';
			$time = date('Ymd',time());
			$uptypes = array('image/jpg', 'image/jpeg', 'image/png', 'image/pjpeg', 'image/gif', 'image/bmp', 'image/x-png');
			$max_file_size = 2000000;
			switch ($type) {
				case 'links':
					$destination_folder = './Upload/images/Links/'.$time.'/';  //图片文件夹路径
					$return_path = '/Upload/images/Links/'.$time.'/';
					break;
				case 'news':
					$destination_folder = './Upload/images/News/'.$time.'/';  //图片文件夹路径
					$return_path = '/Upload/images/News/'.$time.'/';
					break;
				case 'banner':
					$destination_folder = './Upload/images/Banner/'.$time.'/';  //图片文件夹路径
					$return_path = '/Upload/images/Banner/'.$time.'/';
					break;
				case 'advert':
					$destination_folder = './Upload/images/Advert/'.$time.'/';  //图片文件夹路径
					$return_path = '/Upload/images/Advert/'.$time.'/';
					break;	
				case 'product':
					$destination_folder = './Upload/images/Product/'.$time.'/';  //图片文件夹路径
					$return_path = '/Upload/images/Product/'.$time.'/';
					break;	
				case 'web_setting':
					$destination_folder = './Upload/images/Web_setting/'.$time.'/';  //图片文件夹路径
					$return_path = '/Upload/images/Web_setting/'.$time.'/';
					break;
				case 'pages':
					$destination_folder = './Upload/images/Pages/'.$time.'/';  //图片文件夹路径
					$return_path = '/Upload/images/Pages/'.$time.'/';
					break;
				default:
					$destination_folder = './Upload/images/'.$time.'/';  //图片文件夹路径
					$return_path = '/Upload/images/'.$time.'/';
					break;
			}
			//创建存放图片的文件夹
			if (!is_dir($destination_folder)) {
			   $res = mkdir($destination_folder, 0777, true);
			}
			if (!is_uploaded_file($_FILES['pictrue']['tmp_name'])) {
			    echo '图片不存在!';
			    die;
			}
			$file = $_FILES['pictrue'];

			if ($max_file_size < $file['size']) {
			    echo '文件太大!';
			    die;
			}
			if (!in_array($file['type'], $uptypes)) {
			    echo '文件类型不符!' . $file['type'];
			    die;
			}
			$filename = $file['tmp_name'];
			$pinfo = pathinfo($file['name']);
			$ftype = $pinfo['extension'];
			$destination = $destination_folder . str_shuffle(time() . rand(111111, 999999)) . '.' . $ftype;
			if (file_exists($destination) && $overwrite != true) {
			    echo '同名文件已经存在了';
			    die;
			}
			if (!move_uploaded_file($filename, $destination)) {
			    echo '移动文件出错';
			    die;
			}
			$pinfo = pathinfo($destination);
			$fname = $return_path.$pinfo['basename'];
			$info[] = $fname;
			echo json_encode($fname);
		}
	}

	public function Uploads()
	{
		if($this->request->isAJAX()){
			$type = !empty($_GET['type']) ? $_GET['type'] : '';
			$time = date('Ymd',time());
			$uptypes = array('image/jpg', 'image/jpeg', 'image/png', 'image/pjpeg', 'image/gif', 'image/bmp', 'image/x-png');
			$max_file_size = 2000000;
			switch ($type) {
				case 'links':
					$destination_folder = './Upload/images/Links/'.$time.'/';  //图片文件夹路径
					$return_path = '/Upload/images/Links/'.$time.'/';
					break;
				case 'news':
					$destination_folder = './Upload/images/News/'.$time.'/';  //图片文件夹路径
					$return_path = '/Upload/images/News/'.$time.'/';
					break;
				case 'banner':
					$destination_folder = './Upload/images/Banner/'.$time.'/';  //图片文件夹路径
					$return_path = '/Upload/images/Banner/'.$time.'/';
					break;
				case 'advert':
					$destination_folder = './Upload/images/Advert/'.$time.'/';  //图片文件夹路径
					$return_path = '/Upload/images/Advert/'.$time.'/';
					break;	
				case 'product':
					$destination_folder = './Upload/images/Product/'.$time.'/';  //图片文件夹路径
					$return_path = '/Upload/images/Product/'.$time.'/';
					break;	
				case 'web_setting':
					$destination_folder = './Upload/images/Web_setting/'.$time.'/';  //图片文件夹路径
					$return_path = '/Upload/images/Web_setting/'.$time.'/';
					break;
				case 'pages':
					$destination_folder = './Upload/images/Pages/'.$time.'/';  //图片文件夹路径
					$return_path = '/Upload/images/Pages/'.$time.'/';
					break;
				default:
					$destination_folder = './Upload/images/'.$time.'/';  //图片文件夹路径
					$return_path = '/Upload/images/'.$time.'/';
					break;
			}
			//创建存放图片的文件夹
			if (!is_dir($destination_folder)) {
			   $res = mkdir($destination_folder, 0777, true);
			}
			if (!is_uploaded_file($_FILES['qrcode']['tmp_name'])) {
			    echo '图片不存在!';
			    die;
			}
			$file = $_FILES['qrcode'];

			if ($max_file_size < $file['size']) {
			    echo '文件太大!';
			    die;
			}
			if (!in_array($file['type'], $uptypes)) {
			    echo '文件类型不符!' . $file['type'];
			    die;
			}
			$filename = $file['tmp_name'];
			$pinfo = pathinfo($file['name']);
			$ftype = $pinfo['extension'];
			$destination = $destination_folder . str_shuffle(time() . rand(111111, 999999)) . '.' . $ftype;
			if (file_exists($destination) && $overwrite != true) {
			    echo '同名文件已经存在了';
			    die;
			}
			if (!move_uploaded_file($filename, $destination)) {
			    echo '移动文件出错';
			    die;
			}
			$pinfo = pathinfo($destination);
			$fname = $return_path.$pinfo['basename'];
			$info[] = $fname;
			echo json_encode($fname);
		}
	}

	//--------------------------------------------------------------------
	public function news_kindeditor_upload(){
		//文件保存目录路径
		$save_path = './Upload/attached/';
		//文件保存目录URL
		$save_url = '/Upload/attached/';
		//定义允许上传的文件扩展名
		$ext_arr = array(
			'image' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
			'flash' => array('swf', 'flv'),
			'media' => array('swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb'),
			'file' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2'),
		);
		//最大文件大小
		$max_size = 1024*1024; //1M

		if (!is_dir($save_path)) {
		   $res = mkdir($save_path, 0777, true);
		}

		//PHP上传失败
		if (!empty($_FILES['imgFile']['error'])) {
			switch($_FILES['imgFile']['error']){
				case '1':
					$error = '超过php.ini允许的大小。';
					break;
				case '2':
					$error = '超过表单允许的大小。';
					break;
				case '3':
					$error = '图片只有部分被上传。';
					break;
				case '4':
					$error = '请选择图片。';
					break;
				case '6':
					$error = '找不到临时目录。';
					break;
				case '7':
					$error = '写文件到硬盘出错。';
					break;
				case '8':
					$error = 'File upload stopped by extension。';
					break;
				case '999':
				default:
					$error = '未知错误。';
			}
			echo json_encode(array('error' => 1, 'error' => $error));
			exit;
		}

		//有上传文件时
		if (empty($_FILES) === false) {
			//原文件名
			$file_name = $_FILES['imgFile']['name'];
			//服务器上临时文件名
			$tmp_name = $_FILES['imgFile']['tmp_name'];
			//文件大小
			$file_size = $_FILES['imgFile']['size'];
			//检查文件名
			if (!$file_name) {
				echo json_encode(array('error' => 1, 'error' => "请选择文件。"));
				exit;
			}
			//检查目录
			if (@is_dir($save_path) === false) {
				echo json_encode(array('error' => 1, 'error' => "上传目录不存在。"));
				exit;
			}
			//检查目录写权限
			if (@is_writable($save_path) === false) {
				echo json_encode(array('error' => 1, 'error' => "上传目录没有写权限。"));
				exit;
			}
			//检查是否已上传
			if (@is_uploaded_file($tmp_name) === false) {
				echo json_encode(array('error' => 1, 'error' => "上传失败。"));
				exit;
			}
			//检查文件大小
			if ($file_size > $max_size) {
				echo json_encode(array('error' => 1, 'error' => "上传文件大小超过限制。"));
				exit;
			}
			//检查目录名
			$dir_name = empty($_GET['dir']) ? 'image' : trim($_GET['dir']);
			if (empty($ext_arr[$dir_name])) {
				echo json_encode(array('error' => 1, 'error' => "目录名不正确。"));
				exit;
			}
			//获得文件扩展名
			$temp_arr = explode(".", $file_name);
			$file_ext = array_pop($temp_arr);
			$file_ext = trim($file_ext);
			$file_ext = strtolower($file_ext);
			//检查扩展名
			if (in_array($file_ext, $ext_arr[$dir_name]) === false) {
				echo json_encode(array('error' => 1, 'error' => "上传文件扩展名是不允许的扩展名。\n只允许" . implode(",", $ext_arr[$dir_name]) . "格式。"));
				exit;
			}
			//创建文件夹
			if ($dir_name !== '') {
				$save_path .= $dir_name . "/";
				$save_url .= $dir_name . "/";
				if (!file_exists($save_path)) {
					mkdir($save_path);
				}
			}
			$ymd = date("Ymd");
			$save_path .= $ymd . "/";
			$save_url .= $ymd . "/";
			if (!file_exists($save_path)) {
				mkdir($save_path);
			}
			//新文件名
			$new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
			//移动文件
			$file_path = $save_path . $new_file_name;

			if (move_uploaded_file($tmp_name, $file_path) === false) {
				echo json_encode(array('error' => 1, 'error' => "上传文件失败。"));
				exit;
			}
			@chmod($file_path, 0644);
			$file_url = $save_url . $new_file_name;
			echo json_encode(array('error' => 0, 'url' => $file_url));
			exit;
		}
	}

}
