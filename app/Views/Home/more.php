
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no" />
<title>产品案例 - <?= !empty($web_info['web_title']) ? $web_info['web_title'] : '';?></title>
<meta name="generator" content="COS CMS" />
<meta name="author" content="<?= !empty($web_info['web_name']) ? $web_info['web_name'] : '';?>" />
<meta name="keywords" content="<?= !empty($web_info['web_keywords']) ? $web_info['web_keywords'] : '';?>" />
<meta name="description" content="<?= !empty($web_info['web_description']) ? $web_info['web_description'] : '';?>" />
<link rel="shortcut icon" id="favicon" href="/favicon.png" />
  
<link rel="stylesheet" href="/public/home/css/main.css?v=17.24" /> 
<link rel="stylesheet" href="/public/home/css/animation.css" /> 
</head> 
<body class="case-page open">
	 
<div id="main-container">
	<div class="inner-wrap">
	  <ul class="cases">
	  		<?php foreach($product as $key=>$val){ ?>
  			<li>
				<div class="case-img">
					<div class="img-box"> 
					<img src="<?= !empty($val['pictrue']) ? $val['pictrue'] : ''; ?>" alt="<?= !empty($val['title']) ? $val['title'] : ''; ?>" />					</div>
					<a class="cover" href="/home/show?id=<?= $val['id'];?>"></a>
					<div class="ck"></div>
				</div>
				<div class="intro">
					<h2><a href="/home/show?id=<?= $val['id'];?>"><?= !empty($val['title']) ? $val['title'] : ''; ?></a></h2> 
					<p><?= !empty($val['keywords']) ? $val['keywords'] : ''; ?></p>
					<a class="cover"></a>
				</div>
			</li>
			<?php } ?>
		</ul>
	<div class="pages">共<span><?= $page; ?></span>页<span><?= $total; ?></span>条记录</div>	</div>
	<ul class="btns">
		<li><a class="up"></a></li>
		<li><a class="tel" href="tel:400-990-0334"></a>
			<div class="info"><p>咨询热线<br /><?= !empty($web_info['web_tel']) ? $web_info['web_tel'] : '';?></p></div>
		</li> 
		<li><a class="qq" href="http://wpa.qq.com/msgrd?v=3&uin=<?= !empty($web_info['web_qq']) ? $web_info['web_qq'] : '';?>&site=qq&menu=yes" target="_blank"></a>
			<div class="info"><p class="qq">点击我，在线咨询</p></div>
		</li>
	</ul>
</div>
<div class="sub-nav">
	<div class="news-cate"> 
		<a class="cur" href="/home/more?id=7">全部案例</a>
		<?php foreach($product_class as $key=>$val){ ?> 
 		<a href="/home/more/more?id=<?= $val['id'];?>" ><?= $val['title'];?></a>
 		<?php }?>
	</div>
</div>

<aside class="main">
<h1><a href="/"><img alt="logo" src="<?= $web_info['web_logo'];?>" width="100%" /></a></h1>
<div class="qrcode aside-container"><img src="<?= !empty($web_info['web_qrcode']) ? $web_info['web_qrcode'] : '';?>" /><p>扫一扫微信二维码<i></i></p>
</div>
<nav class="aside-container">
	<ul>
		<li><a href="/">网站首页</a></li>
		<li><a class="cur" href="/home/more?id=7">产品案例</a></li>
		<li><a href="severs.html">服务目录</a></li>
		<li><a href="news.html">最新资讯</a></li>
	</ul>
</nav>
<footer>
<?= !empty($web_info['web_name']) ? $web_info['web_name'] : '';?><br />
<?= !empty($web_info['web_copyright']) ? $web_info['web_copyright'] : '';?></footer>
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
	$(".news-cate-dropdown button").click(function(){
		var box=$(".news-cate-dropdown");
		if(box.hasClass("active")){
			box.removeClass("active");
		}else{
			box.addClass('active');
		}
	})
</script>
</body>
</html> 