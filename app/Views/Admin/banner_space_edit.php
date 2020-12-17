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
						轮播图位置修改
						<a href="javascript:history.go(-1);"><button class="btn btn-info" style="float: right;"><i class="ace-icon fa fa-undo bigger-100"></i>返回</button></a>
					</h1>
					
				</div>
				<div class="row">
					<div class="col-xs-12">
						<form class="form-horizontal" id="validation-form" novalidate="novalidate">
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="title">标题:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="title" id="title" class="col-xs-12 col-sm-3" value="<?= !empty($info['title']) ? $info['title'] : ''; ?>">
									</div>
								</div>
							</div>
							
							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="width">宽:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="width" id="width" class="col-xs-12 col-sm-3" value="<?= !empty($info['width']) ? $info['width'] : ''; ?>">
									</div>
								</div>
							</div>
							
							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="height">高:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="height" id="height" class="col-xs-12 col-sm-3" value="<?= !empty($info['height']) ? $info['height'] : ''; ?>">
									</div>
								</div>
							</div>
							
							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="sort">排序:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="sort" id="sort" class="col-xs-12 col-sm-3" value="<?= !empty($info['sort']) ? $info['sort'] : ''; ?>">
									</div>
								</div>
							</div>
							
							<div class="space-2"></div>
							<input type="hidden" name="id" value="<?= $info['id']; ?>">
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
			title: {
				required: true
			},
			width: {
				required: true
			},
			height: {
				required: true
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
				url:'/Admin/Banner_Space/edit',
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
	                setTimeout('window.location.href="/Admin/Banner_Space"',1500);
	            }
	        })
		},
	});
</script>
</body>
</html>
