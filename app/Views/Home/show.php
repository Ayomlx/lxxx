
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no" />
<title><?= !empty($info['title']) ? $info['title'] : '';?> - <?= !empty($class_list[$info['class_id']]) ? $class_list[$info['class_id']] : ''; ?> - <?= !empty($web_info['web_title']) ? $web_info['web_title'] : ''; ?></title>
<meta name="generator" content="COS CMS" />
<meta name="author" content="chinavdi" />
<meta name="keywords" content="<?= !empty($web_info['web_keywords']) ? $web_info['web_keywords'] : '';?>" />
<meta name="description" content="<?= !empty($web_info['web_description']) ? $web_info['web_description'] : '';?>" />
<link rel="shortcut icon" id="favicon" href="/favicon.png" />
  
<link rel="stylesheet" href="/public/home/css/main.css?v=17.24" /> 
<link rel="stylesheet" href="/public/home/css/animation.css" /> 
</head> 
<body class="details-page open">
	  <div id="main-container">
	<div class="inner-wrap">
		<div class="case-detail">
			<p class="caption">项目介绍</p>
			<h1>[<?= !empty($info['title']) ? $info['title'] : '';?>]</h1><span class="info"><?= !empty($info['keywords']) ? $info['keywords'] : ''; ?></span>
						<div class="intro"><?= !empty($info['description']) ? $info['description'] : ''; ?></div>
			<p class="caption"><?= !empty($class_list[$info['class_id']]) ? $class_list[$info['class_id']] : ''; ?></p> 
			<div class="imgs">
				<?= !empty($info['content']) ? $info['content'] : ''; ?>
			</div> 
		</div> 
	</div>
	<ul class="btns">
		<li>
			<a class="up"></a>
		</li>
		<li>
			<a class="tel" href="tel:<?= !empty($web_info['web_tel']) ? $web_info['web_tel'] : ''; ?>"></a>
			<div class="info"><p>咨询热线<br /><?= !empty($web_info['web_tel']) ? $web_info['web_tel'] : ''; ?></p></div>
		</li> 
		<li>
			<a class="qq" href="http://wpa.qq.com/msgrd?v=3&uin=<?= !empty($web_info['web_qq']) ? $web_info['web_qq'] : ''; ?>&site=qq&menu=yes" target="_blank"></a>
			<div class="info"><p class="qq">点击我，在线咨询</p></div>
		</li>
	</ul>
</div>
<div class="sub-nav">
	<ul class="btn">
		<li>
			<a href="case.php"><img src="/public/home/img/home.png"><span style="margin-left:5px" class="yc">产品案例</span></a>
		</li>
		<li>
	    	<a href="#"><span><img src="/public/home/img/preno.png"></span></a>
		</li>
		<li>
			<a href="#"><span><img src="/public/home/img/nextno.png"></span></a>
		</li>	
	</ul>
</div> 

<aside class="main">
<h1><a href="index.php"><img alt="logo" src="<?= !empty($web_info['web_logo']) ? $web_info['web_logo'] : '';?>" width="100%" /></a></h1>
<div class="qrcode aside-container"><img src="<?= !empty($web_info['web_qrcode']) ? $web_info['web_qrcode'] : '';?>" /><p>扫一扫微信二维码<i></i></p>
</div>
<nav class="aside-container">
	<ul>
		<li><a href="/">网站首页</a></li>
		<li><a class="cur" href="case.php">产品案例</a></li>
		<li><a href="severs.php">服务目录讯</a></li>
		<li><a href="news.php">最新资讯</a></li>
	</ul>
</nav>
   	 
<footer>
<?= !empty($web_info['web_name']) ? $web_info['web_name'] : ''; ?><br />
<?= !empty($web_info['web_record']) ? $web_info['web_record'] : ''; ?></footer>
</aside>
<script type="text/javascript" src="/public/home/js/jquery-1.9.1.js"></script>
<script type="text/javascript">
	$(".sub-nav .switch").click(function(){ 
		if($('body').hasClass('open')){
			$(this).attr('data-icon',9);		
			$('body').removeClass('open').addClass('close');
		}else{
			$(this).attr('data-icon',8);
			$('body').removeClass('close').addClass('open');
		}
		
	});
	$(".btns .up").click(function(){ 
		$("html,body").animate({scrollTop:0},600);
	});
</script>
</body>
</html> 