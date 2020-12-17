<!DOCTYPE>
<html style="overflow: hidden; height: 100%;">
<head>
<script src="/public/home/js/push.js"></script>
<script src="/public/home/js/hm.js"></script>
<script>
		var _hmt = _hmt || [];
	(function() {
	  var hm = document.createElement("script");
	  hm.src = "/public/home/js/hm.js?b5538ba3163f84b392ca6fbc5f624f62";
	  var s = document.getElementsByTagName("script")[0]; 
	  s.parentNode.insertBefore(hm, s);
	})();
</script>
<meta name="renderer" content="webkit">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
<title><?= !empty($web_info['web_title']) ? $web_info['web_title'] : '';?></title>
<meta name="generator" content="COS CMS">
<meta name="author" content="chinavdi">
<meta name="keywords" content="<?= !empty($web_info['web_keywords']) ? $web_info['web_keywords'] : '';?>">
<meta name="description" content="<?= !empty($web_info['web_description']) ? $web_info['web_description'] : '';?>">
<!-- <link rel="shortcut icon" id="favicon" href="http://jinghai.com/favicon.ico"> -->
<link rel="stylesheet" href="/public/home/css/bootstrap.css" />
<link rel="stylesheet" href="/public/home/css/home.css" />
<link rel="stylesheet" href="/public/home/css/main.css" />
<link rel="stylesheet" href="/public/home/css/animation.css" />
<link rel="stylesheet" href="/public/home/css/swiper.min.css" />




<style type="text/css">
	#intro {
		padding: 0;
		margin: 0;
		height: 0 !important;
		width: 0;
		overflow: hidden !important;
	}

	#intro .logo {
		float: left;
		margin: 0 10px 10px 0;
	}

	@media screen and (min-width:600px) {
		.slide1 {
			background-image: url(<?= !empty($banner_info['page1'][0]['pictrue']) ? $banner_info['page1'][0]['pictrue'] : ''; ?>);
		}

		.slide2 {
			background-image: url(<?= !empty($banner_info['page1'][1]['pictrue']) ? $banner_info['page1'][1]['pictrue'] : ''; ?>);
		}

		.slide3 {
			background-image: url(<?= !empty($banner_info['page1'][2]['pictrue']) ? $banner_info['page1'][2]['pictrue'] : ''; ?>);
		}

		.slide4 {
			background-image: url(<?= !empty($banner_info['page1'][3]['pictrue']) ? $banner_info['page1'][3]['pictrue'] : ''; ?>);
		}
	}

	@media screen and (max-width:600px) {
		.slide1 {
			background-image: url(<?= !empty($wap_banner_info['page1'][0]['pictrue']) ? $banner_info['page1'][0]['pictrue'] : ''; ?>);
		}

		.slide2 {
			background-image: url(<?= !empty($wap_banner_info['page1'][1]['pictrue']) ? $banner_info['page1'][1]['pictrue'] : ''; ?>);
		}

		.slide3 {
			background-image: url(<?= !empty($wap_banner_info['page1'][2]['pictrue']) ? $banner_info['page1'][2]['pictrue'] : ''; ?>);
		}

		.slide4 {
			background-image: url(<?= !empty($wap_banner_info['page1'][3]['pictrue']) ? $banner_info['page1'][3]['pictrue'] : ''; ?>);
		}
	}


	@media screen and (min-width:600px) {
		.page2 {
			background-image: url(<?= !empty($banner_info['page2'][0]['pictrue']) ? $banner_info['page2'][0]['pictrue'] : ''; ?>);
		}

		.page3 {
			background-image: url(<?= !empty($banner_info['page3'][0]['pictrue']) ? $banner_info['page3'][0]['pictrue'] : ''; ?>);
		}

		.page4 {
			background-image: url(<?= !empty($banner_info['page4'][0]['pictrue']) ? $banner_info['page4'][0]['pictrue'] : ''; ?>);
		}

		.page5 {
			background-image: url(<?= !empty($banner_info['page5'][0]['pictrue']) ? $banner_info['page5'][0]['pictrue'] : ''; ?>);
		}

		.page6 {
			background-image: url(<?= !empty($banner_info['page6'][0]['pictrue']) ? $banner_info['page6'][0]['pictrue'] : ''; ?>);
		}

	}

	@media screen and (max-width:600px) {
		.page2 {
			background-image: url(<?= !empty($wap_banner_info['page2'][0]['pictrue']) ? $banner_info['page2'][0]['pictrue'] : ''; ?>);
		}

		.page3 {
			background-image: url(<?= !empty($wap_banner_info['page3'][0]['pictrue']) ? $banner_info['page3'][0]['pictrue'] : ''; ?>);
		}

		.page4 {
			background-image: url(<?= !empty($wap_banner_info['page4'][0]['pictrue']) ? $banner_info['page4'][0]['pictrue'] : ''; ?>);
		}

		.page5 {
			background-image: url(<?= !empty($wap_banner_info['page5'][0]['pictrue']) ? $banner_info['page5'][0]['pictrue'] : ''; ?>);
		}

		.page6 {
			background-image: url(<?= !empty($wap_banner_info['page6'][0]['pictrue']) ? $banner_info['page6'][0]['pictrue'] : ''; ?>);
		}

	}

	@media screen and (min-width:1050px) {
		#index_x {
			display: none
		}
	}

	.STYLE1 {
		font-size: 18;
		color: #00DFB8;
	}

	.STYLE2 {
		color: #00DFB8
	}

	.STYLE3 {
		color: #BD2E0F;
		font-weight: bold;
	}

	.STYLE4 {
		font-weight: bold
	}
	@media screen and (max-width: 700px){
		.home-about-navi {
		    top: 70%;
		   
		}
	}
	
</style>
<script src="/public/home/js/jquery-1.11.1.min.js"></script>
<script>
	$(document).ready(function() {
		$("#index_x").click(function() {
			$("#menu").hide();
		});
		$("#index_xs").click(function() {
			$("#menu").show();
		});
	});
</script>

</head>
	<body style="overflow: hidden; height: 100%;" class="fp-viewing-page2">
		<header id="header" class="down">
			<div class="container clearfix">
				<h1 id="logo"> 
					<a href="/">
						<img alt="logo" src="<?= $web_info['web_logo'];?>">
					</a>
				</h1>
				<nav>
					<ul id="menu">
						<li data-menuanchor="page1" class="active"><a data-name="index.html" href="#page1"><span>首页</span></a></li>
						<li data-menuanchor="page2"><a href="#page2"><span>产品</span></a></li>
						<li data-menuanchor="page3"><a href="#page3"><span>案例</span></a></li>
						<li data-menuanchor="page4"><a href="#page4"><span>技术</span></a></li>
						<li data-menuanchor="page5"><a href="#page5"><span>关于</span></a></li>
						<li data-menuanchor="page6"><a href="#page6"><span>联系</span></a></li>
						<li style=" width:100%;float:right" id="index_x"><img src="/public/home/img/close.png" style="padding-right:15px; float:right; margin-top:10px"></li>
					</ul>
				</nav>
			</div>
		</header>
		<div class="page-container ronbongpage-wrapper" style="height: 100%; position: relative; touch-action: none; transform: translate3d(0px, -978px, 0px); transition: all 700ms ease 0s;">
			<section class="section page1 fp-section fp-table active" style="height: 978px;" data-anchor="page1">
				<div class="fp-tableCell">
					<div class="rbslider-container rbslider-container-horizontal">
						<div class="home-news">
							<span>NEWS:</span>
							<ul style="margin-top: -60px;">
								<?php foreach($news_info as $key=>$val){ ?> 
								<li onclick="location='newsshow-22-63-1.html'"><a href="http://jinghai.com/newsshow-22-63-1.html"><?= !empty($val['title']) ? $val['title'] : ''; ?></a></li>
								<?php } ?>
							</ul>
							<a onclick="location='news.html'" href="http://jinghai.com/news.html" class="more">more</a>
						</div>
						<div class="rbslider-wrapper" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
							<div class="rbslider-slide slide1 rbslider-slide-active" style="width: 1920px;">
								<div class="slide-content slide-content-1">
									<h2><?= !empty($banner_info['page1'][0]['title']) ? $banner_info['page1'][0]['title'] : '';?><b><?= !empty($banner_info['page1'][0]['keyworlds']) ? $banner_info['page1'][0]['keyworlds'] : '';?></b></h2>
									<p class="intro"><?= !empty($banner_info['page1'][0]['description']) ? $banner_info['page1'][0]['description'] : '';?></p>
								</div>
							</div>
							<div class="rbslider-slide slide2 rbslider-slide-next" style="width: 1920px;">
								<div class="slide-content slide-content-2">
									<h2><?= !empty($banner_info['page1'][1]['title']) ? $banner_info['page1'][1]['title'] : '';?></h2>
									<h3><?= !empty($banner_info['page1'][1]['keyworlds']) ? $banner_info['page1'][1]['keyworlds'] : '';?></h3>
									<p class="intro"><?= !empty($banner_info['page1'][1]['description']) ? $banner_info['page1'][1]['description'] : '';?></p>
								</div>
							</div>
							<div class="rbslider-slide slide3" style="width: 1920px;">
								<div class="slide-content slide-content-3">
									<div class="content-box">
										<h2><?= !empty($banner_info['page1'][2]['title']) ? $banner_info['page1'][2]['title'] : '';?><b><?= !empty($banner_info['page1'][2]['keyworlds']) ? $banner_info['page1'][2]['keyworlds'] : '';?></b></h2>
										<p class="intro"><?= !empty($banner_info['page1'][2]['description']) ? $banner_info['page1'][2]['description'] : '';?></p>
									</div>
								</div>
								<div class="background-box"></div>
							</div>
							<div class="rbslider-slide slide4" style="width: 1920px;">
								<div class="slide-content slide-content-4">
									<h2><?= !empty($banner_info['page1'][3]['title']) ? $banner_info['page1'][3]['title'] : '';?></h2>
									<h3><?= !empty($banner_info['page1'][3]['keyworlds']) ? $banner_info['page1'][3]['keyworlds'] : '';?></h3>
									<p class="intro"><?= !empty($banner_info['page1'][3]['description']) ? $banner_info['page1'][3]['description'] : '';?></p>
								</div>
							</div>
						</div>
						<a class="move-down"></a>
						<div class="rbslider-pagination rbslider-pagination-clickable"><span class="rbslider-pagination-bullet rbslider-pagination-bullet-active"></span><span
							 class="rbslider-pagination-bullet"></span><span class="rbslider-pagination-bullet"></span><span class="rbslider-pagination-bullet"></span></div>
					</div>
				</div>
			</section>

			<section class="section page2 fp-section fp-table" style="height: 978px;" data-anchor="page2">
				<div class="fp-tableCell rbslider-item-list-container" style="height:978px;">
					<div class="section-content-container">
						<hgroup>
							<h2>WHAT CAN WE DO ?</h2>
							<h3>我们的服务项目</h3>
						</hgroup>
					<style>
						@media screen and (max-width:992px){
						.section-content.service-list.clearfix li{
							width: 100%!important;
						}
						.service-list li .top{
							padding: 0px!important;
							text-align: center!important;
							border: none!important;
						}
						.top{
							background: none!important;
						}
						.section-content.service-list.clearfix li img{
							margin-top: 10px;
							margin-bottom: 10px;
						}
						.section-content.service-list.clearfix li p{
							margin-top: 10px;
						}
					
						}
					</style>
					<div class="section-content rbslider-item-list-wrapper equipment-list">
						<ul class="section-content service-list clearfix">
							<?php if(!empty($product_list)){ foreach($product_list as $val){ ?> 
							<li>
								<div class="top brand">
									<img src="<?= !empty($val['pictrue']) ? $val['pictrue'] : '';?>" />
									<h3><?= !empty($val['title']) ? $val['title'] : '';?></h3>
									<p><?= !empty($val['keywords']) ? $val['keywords'] : '';?></p>
								</div>
								<div class="intro">
									<p><?= !empty($val['description']) ? $val['description'] : '';?></p>
								</div>
							</li>
							<?php } } ?>
						</ul>
						<div class="home-about-bottom">
							<ul class="clearfix">
								<li>
									<div class="divcss5">
										<div align="center"><a href="http://docs.chinavdi.cn/mny/" class="wider-more">价格预算</a></div>
									</div>
								</li>
								<li>
									<div class="divcss5">
										<div align="center"><a href="http://docs.chinavdi.cn/baseserveices/">云服务</a></div>
									</div>
								</li>
								<li>
									<div class="divcss5">
										<div align="center"><a href="http://docs.chinavdi.cn/Quickstart/">技术支持</a></div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="navigation equipment">
						<a class="prev"></a>
						<a class="next"></a>
					
					</div>
					
				</div>
			</section>

			<section class="section page3 fp-section fp-table" style="background-position: center bottom; height: 978px;"
			 data-anchor="page3">
				<div class="fp-tableCell" style="height:978px;">
					<div class="section-content-container rbslider-item-list-container">
						<hgroup>
							<h2>OUR CASES</h2>
							<h3>部分案例展示</h3>
						</hgroup>
						<div class="section-content rbslider-item-list-wrapper case-list">
							<ul class="rbslider-item-list clearfix">
								<?php if(!empty($case_list)){
									foreach($case_list as $val){ ?> 
								<li>
									<div class="img-box">
										<div class="img"><a href="/home/show/case_show?id=<?= $val['id'];?>"><img src="<?= !empty($val['pictrue']) ? $val['pictrue'] : ''; ?>" alt="<?= !empty($val['title']) ? $val['title'] : ''; ?>"></a></div>
										<div class="ck"></div>
										<div class="cover"></div>
									</div>
									<div class="intro">
										<div class="intro-content">
											<h3><a href="/home/show/case_show?id=<?= $val['id'];?>"><?= !empty($val['title']) ? $val['title'] : ''; ?></a></h3>
											<p><a href="/home/show/case_show?id=<?= $val['id'];?>"><?= !empty($val['keywords']) ? $val['keywords'] : ''; ?></a></p>
										</div>
										<div class="cover"></div>
									</div>
								</li>
								<?php } }?>

								<a class="wider-more" href="/home/more?id=7">MORE</a>
							</ul>
							<div class="rbslider-pagination"></div>
						</div>
						<div class="navigation case">
							<a class="prev"></a>
							<a class="next"></a> </div>
						<div onclick="location='/home/more'" class="rbslider-item-list-more">MORE</div>
					</div>
				</div>
			</section>

			<section class="section page4 fp-section fp-table" style="background-position: center bottom; height: 978px;"
			 data-anchor="page4">
				<div class="fp-tableCell" style="height:978px;">
					<div class="section-content-container">
						<hgroup>
							<h2>OUR PARTNERS</h2>
							<h3>合作伙伴</h3>
						</hgroup>
						<style>
							.row h2{
								font-size: 30px;
								
								margin-bottom: 10px;
							}
							.row p{
								font-size: 16px;
								line-height:200%;
								text-align: justify;
							}
							.row{
								margin-top: 80px;
							}
							.swiper-slide{
								padding: 0 100px;
							}	
						
								
							.swiper-container{
								height: 400px;
							
							}
						
							
							@media screen and (max-width:992px){
							.row h2{
								font-size: 18px;
								margin-top: 20px;
								
							}
							.row p{
								font-size: 14px;
								word-break: break-all;
								overflow:hidden; 
								text-overflow:ellipsis; 
								display:-webkit-box;
								 -webkit-box-orient:vertical; 
								-webkit-line-clamp:5;
								
							}
							.row{
								margin-top: 15px;
							}
							.swiper-slide{
								padding: 0 20px;
							}	
							}
							.swiper-slide{
								display: flex;
							}
							
						
						</style>
						<div class="swiper-container">
						    <div class="swiper-wrapper">
						    	<?php if(!empty($technology_list)){ foreach($technology_list as $val){ ?> 
								<div class="swiper-slide">
								  <div class="row">
								      <div class="col-sm-4 col-sm-push-8">
								          <img src="<?= !empty($val['pictrue']) ? $val['pictrue'] : '';?>" alt="Debugging" class="screenshot">
								      </div>
								      <div class="col-sm-7 col-sm-pull-4">
								          <h2><?= !empty($val['title']) ? $val['title'] : '';?></h2>
								          <p><?= !empty($val['description']) ? $val['description'] : '';?></p>
								      </div>
								  </div>
								</div>
								<?php }}?>
						    </div>
						    <!-- Add Arrows -->
						    <div class="swiper-button-next"></div>
						    <div class="swiper-button-prev"></div>
						  </div>
					</div>
				</div>
			</section>
			<section class="section page5 fp-section fp-table" style="height:auto!important;" data-anchor="page7">
				<div class="fp-tableCell" style="height:auto!important">
					<ul class="home-about">
						<?php if(!empty($pages_list)){ 
							foreach($pages_list as $key=>$val){
						?>
						<li class="">
							<h2><?= !empty($val['title']) ? $val['title'] : '';?></h2>
							<div class="con">
								<?= !empty($val['content']) ? $val['content'] : '';?>
							</div>
							<h3 class="bot"></h3>
						</li>
						<?php } } ?>
					</ul>
					<ul class="home-about-navi">
						<li>愿景</li>
						<li>关于</li>
						<li class="bg" style="top: 32px; left: 0px;"></li>
					</ul>
					<div class="home-about-bottom">
						<ul class="clearfix">
							<li><em>100%</em>用心服务每一个客户</li>
							<li><em>98%</em>的一次通过验收</li>
							<li><em>95%</em>以上的客户续费率</li>
						</ul>
					</div>
				</div>
			</section>

			<section class="section page6 fp-section fp-table" style="height: 978px;" data-anchor="page8">
				<div class="fp-tableCell" style="height:978px;">
					<div class="home-contact">
						<ul class="clearfix">
							<li class="img"><img src="<?= !empty($web_info['web_qrcode']) ? $web_info['web_qrcode'] : ''; ?>" align="微信"></li>

							<li class="center">

								<p><span class="STYLE6"><?= !empty($web_info['company_name']) ? $web_info['company_name'] : ''; ?></span><br>
									联系电话：010-68610-62419321/62419921/62419276<br>
									地址：<a href="http://j.map.baidu.com/havT8" target="_blank"><?= !empty($web_info['company_address']) ? $web_info['company_address'] : ''; ?></a><br>
									邮编：100197<br>
									<span class="STYLE3"><a href="http://jinghai.com/a/job/job.htm">[ 工作机会 ]</a></span>
								</p>
							</li>
							<li class="center">
								<p>
									服务热线：<span class="STYLE4 STYLE1"><strong><?= !empty($web_info['web_tel']) ? $web_info['web_tel'] : ''; ?></strong></span><br>
									Email：<span class="STYLE5 STYLE2"><?= !empty($web_info['web_email']) ? $web_info['web_email'] : ''; ?></span><br>
									技术咨询：<span class="STYLE5"><span class="STYLE2">010-62419921</span></span><br>
									销售热线：<span class="STYLE5 STYLE2">010-62419321</span></p>
								<p></p>
							</li>

							<li class="line"></li>
						</ul>
						<div class="clear"></div>

						<div class="kh">
							<h2><?= !empty($web_info['web_record']) ? $web_info['web_record'] : ''; ?></h2>
							<p style="color: #2ED0B4; font-size:14px"><a href="http://www.miitbeian.gov.cn/publish/query/indexFirst.action"
								 target="_blank"><?= !empty($web_info['web_copyright']) ? $web_info['web_copyright'] : ''; ?>-1 </a></p>
						</div>
					</div>
				</div>
			</section>

		</div>
		<div id="panel">
			<ul class="icons">
				<li class="up" title="上一页"></li>
				<li class="qq"></li>
				<li class="tel"></li>
				<li class="wx"></li>
				<li class="down" title="下一页"></li>
			</ul>
			<ul class="info">
				<li class="qq">
					<p>在线沟通，请点我<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?= !empty($web_info['web_qq']) ? $web_info['web_qq'] : ''; ?>&amp;site=qq&amp;menu=yes" target="_blank">在线咨询</a></p>
				</li>
				<li class="tel">
					<p>咨询热线：<br><?= !empty($web_info['web_tel']) ? $web_info['web_tel'] : ''; ?><br>客服qq：<br><?= !empty($web_info['web_qq']) ? $web_info['web_qq'] : ''; ?></p>
				</li>
				<li class="wx">
					<div class="img"><img src="<?= !empty($web_info['web_qrcode']) ? $web_info['web_qrcode'] : ''; ?>"></div>
				</li>
			</ul>
		</div>
		<div class="index_cy"></div>
		<script type="text/javascript" src="/public/home/js/jquery-1.9.1.js"></script>
		<script type="text/javascript">
			$("header nav .icon_menu").click(function() {
				$(this).siblings("ul").toggleClass("show");
			});
			$("#panel .icons li").not(".up,.down").mouseenter(function() {
				$("#panel .info").addClass('hover');
				$("#panel .info li").hide();
				$("#panel .info li." + $(this).attr('class')).show();
			});
			$("#panel").mouseleave(function() {
				$("#panel .info").removeClass('hover');
			})
			$(".icons .up").click(function() {
				$.fn.ronbongpage.moveSectionUp();
			});
			$(".icons .down").click(function() {
				$.fn.ronbongpage.moveSectionDown();
			});
			$(".index_cy").click(function() {
				$("#panel").toggle();
				$(".index_cy").addClass('index_cy2');
				$(".index_cy2").removeClass('index_cy');
			});
		</script>
		<script type="text/javascript" src="/public/home/js/home.js"></script>
		<script type="text/javascript" src="/public/home/js/swiper.min.js"></script>
		<script>
			(function() {

				var bp = document.createElement('script');

				bp.src = 'js/push.js';

				var s = document.getElementsByTagName("script")[0];

				s.parentNode.insertBefore(bp, s);

			})();
			    var swiper = new Swiper('.swiper-container', {
			      navigation: {
			        nextEl: '.swiper-button-next',
			        prevEl: '.swiper-button-prev',
			      },
			    });
		</script>
		
	</body>
</html>
