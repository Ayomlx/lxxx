<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Login Page - Ace Admin</title>

	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="/public/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/public/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

	<!-- text fonts -->
	<link rel="stylesheet" href="/public/assets/css/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="/public/assets/css/ace.min.css" />

	<!--[if lte IE 9]>
		<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
	<![endif]-->
	<link rel="stylesheet" href="/public/assets/css/ace-rtl.min.css" />
	<link rel="stylesheet" type="text/css" href="/public/dialog/css/global.css">
	<link rel="stylesheet" type="text/css" href="/public/dialog/css/animate.css">
	<link rel="stylesheet" type="text/css" href="/public/dialog/css/dialog.css">
	<link rel="stylesheet" type="text/css" href="/public/resource/css/common.css">
</head>

<body class="login-layout admin_bgimg">
	<div class="main-container">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1" style="top:80px;">
					<div class="login-container">
						<div class="center">
							<h1>
								<i class="ace-icon fa fa-leaf green"></i>
								<span class="red">CNCC</span>
								<span class="white" id="id-text2">Application</span>
							</h1>
							<h4 class="blue" id="id-company-text">&copy; Company Name</h4>
						</div>

						<div class="space-6"></div>

						<div class="position-relative">
							<div id="login-box" class="login-box visible widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<h4 class="header blue lighter bigger">
											<i class="ace-icon fa fa-coffee green"></i>
											Please Enter Your Information
										</h4>

										<div class="space-6"></div>

										<form id="form_login">
											<fieldset>
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="text" name="username" class="form-control" placeholder="Username" />
														<i class="ace-icon fa fa-user"></i>
													</span>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="password" name="password" class="form-control" placeholder="Password" />
														<i class="ace-icon fa fa-lock"></i>
													</span>
												</label>
												<label class="red clearfix" id="error"></label>
												<div class="space"></div>

												<div class="clearfix">

													<button type="button" class="width-35 pull-right btn btn-sm btn-primary" onclick="dologin()">
														<i class="ace-icon fa fa-key"></i>
														<span class="bigger-110">Login</span>
													</button>
												</div>

												<div class="space-4"></div>
											</fieldset>
										</form>
									</div><!-- /.widget-main -->
								</div><!-- /.widget-body -->
							</div><!-- /.login-box -->
						</div><!-- /.position-relative -->
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.main-content -->
	</div><!-- /.main-container -->

	<!-- basic scripts -->

	<!--[if !IE]> -->
	<script src="/public/assets/js/jquery-2.1.4.min.js"></script>

	<!-- <![endif]-->

	<!--[if IE]>
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<![endif]-->
	<script type="text/javascript">
		if('ontouchstart' in document.documentElement) document.write("<script src='/public/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>

	<!-- inline scripts related to this page -->
	<script type="text/javascript">
		function dologin(){
			var data = $("#form_login").serialize();
			$.ajax({
				url:'/admin/login/dologin',
				type:'POST',
				datatype:'json',
				data:data,
				beforeSend:function(){
					$("#error").html('<img src="/public/resource/images/loading.gif">');
				}
			})
			.done(function(r) {
				var re = JSON.parse(r);
                if(re.code == 0){
                    $("#error").html('<span class="green">'+re.msg+'</span>');
                    setTimeout('window.location.href="/admin/index"',1500);
                }else{
                    $("#error").html(re.msg);
                }
            })
            .fail(function() {
                $("#error").html('未知错误');
            });
		}
	</script>
</body>
</html>
