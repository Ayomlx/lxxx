<?php include('header.php'); ?>
<body class="no-skin">
	<?php include('top.php'); ?>
<div class="main-container ace-save-state" id="main-container">
	<div id="sidebar" class="sidebar responsive ace-save-state">
		<?php include('menu.php'); ?>

		<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
			<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
		</div>
	</div>

	<div class="main-content">
		<div class="main-content-inner">
			<?php include('nav.php'); ?>

			<div class="page-content">
				<!-- search -->
				<!-- search end -->
				<div class="page-header">
					<h1>
						会员添加
						<a href="javascript:history.go(-1);"><button class="btn btn-info" style="float: right;"><i class="ace-icon fa fa-undo bigger-100"></i>返回</button></a>
					</h1>
					
				</div>
				<div class="row">
					<div class="col-xs-12">
						<form class="form-horizontal" id="validation-form" novalidate="novalidate">
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="username">用户名:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="username" id="username" class="col-xs-12 col-sm-3">
									</div>
								</div>
							</div>

							
							<div class="space-2"></div>

 							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">密码:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="password" name="password" id="password" class="col-xs-12 col-sm-3">
									</div>
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="repassword">确认密码:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="password" name="repassword" id="repassword" class="col-xs-12 col-sm-3">
									</div>
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="nickname">昵称:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="nickname" id="nickname" class="col-xs-12 col-sm-3">
									</div>
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 性别 </label>

								<div class="col-xs-12 col-sm-9">
									<select class="chosen-select form-control" id="form-field-select-3" name="sex" style="display: none;">
										<option value="1">男</option>
										<option value="2">女</option>
									</select>
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="birthday"> 出生日期 </label>

								<div class="col-xs-12 col-sm-9">
									<input class="date-picker col-xs-12 col-sm-3" name="birthday" id="birthday" type="text" data-date-format="yyyy-mm-dd" autocomplete="off">
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="email"> email </label>

								<div class="col-sm-9">
									<input type="email" id="email" name="email" class="col-xs-12 col-sm-3">
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="phone"> 手机号 </label>
								<div class="col-sm-9">
									<input type="text" id="phone" name="phone" class="col-xs-12 col-sm-3">
								</div>
							</div>

							<div class="space-2"></div>
							<input type="hidden" name="controller" value="<?= $Controller; ?>">
							<div class="clearfix form-actions">
								<div class="col-md-offset-3 col-md-9">
									<button class="btn btn-info btn-next" data-last="Finish">
										<i class="ace-icon fa fa-check bigger-110"></i>
										Submit
									</button>

									&nbsp; &nbsp; &nbsp;
									<button class="btn" type="reset">
										<i class="ace-icon fa fa-undo bigger-110"></i>
										Reset
									</button>
								</div>
							</div>
						</form>	
					</div>	
				</div><!-- /.row -->
			</div><!-- /.page-content -->
		</div>
	</div><!-- /.main-content -->
<?php include('footer.php'); ?>
</div><!-- /.main-container -->
<?php include('basic.php'); ?>
<script src="/public/assets/js/chosen.jquery.min.js"></script>
<script src="/public/assets/js/bootstrap-datepicker.min.js"></script>
<script src="/public/assets/js/bootbox.js"></script>
<script src="/public/assets/js/messages_zh.js"></script>
<script type="text/javascript">
	$('.chosen-select').chosen({allow_single_deselect:true});
	$('.chosen-select').each(function() {
		 var $this = $(this);
		 $this.next().css({'width': '310px'});
	})
	$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true
	});
</script>
<script type="text/javascript">
	$('#validation-form').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		rules: {
			username: {
				required: true,
				check_username:true
			},
			password: {
				required: true,
				minlength: 6
			},
			repassword: {
				required: true,
				minlength: 6,
				equalTo: "#password"
			},
			nickname: {
				required: true,
				check_nickname:true
			},
			birthday: {
				required: true
			},
			email: {
				required: true
			},
			phone: {
				required: true,
				check_phone:true
			}
		},
		messages: {
			repassword: {
				equalTo : '请确认输入得密码一致'
			}
		},
		highlight: function (e) {
			$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
		},
		success: function (e) {
			$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
			$(e).remove();
		},
		submitHandler: function (form) {
			var data = $("#validation-form").serialize();
			$.ajax({
				url:'/admin/member/add',
				type:'POST',
				async:false,
				datatype:'json',
				data:data,
			})
			.done(function(r) {
				var re = JSON.parse(r);
	            if(re.code == 0){
	            	$.message({
            	        message:re.msg,
            	        type:'success'
            	    });
	                setTimeout('window.location.href="/admin/member"',1500);
	            }
	        })
		},
	});
</script>
</body>
</html>
