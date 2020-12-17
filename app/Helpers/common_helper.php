<?php 
/**
 * 缓存文件读取 写入
 *
 * @param $name  //文件名字
 * @param string $value
 * @param string $path // 路径
 * @return bool|mixed|string
 */
function CF($name, $value = '', $path = 'Config/')
{
	static $_cache = array();
	$filename = $path . $name . '.php';

	if ('' !== $value) {
		if (is_null($value)) {
			// 删除缓存
			return unlink($filename);
		} else {

			// 缓存数据
			$dir = dirname($filename);
			// 目录不存在则创建
			if (!is_dir($dir))
				mk_dir($dir);
			$_cache [$name] = $value;
			file_put_contents($filename, strip_whitespace("<?php\nreturn " . var_export($value, true) . ";\n?>"));
		}
	}

	if (isset ($_cache [$name]))
		return $_cache [$name];

	// 获取缓存数据

	if (is_file($filename)) {

		$value = include $filename;
		$_cache [$name] = $value;
	} else {
		$value = false;
	}
	return $value;
}

 ?>