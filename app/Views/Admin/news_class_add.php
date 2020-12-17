<?php include('header.php'); ?>
<style type="text/css">
	.file-caption-main .kv-fileinput-caption{
		height: 42px!important;
	}
</style>
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
						新闻分类添加
						<a href="javascript:history.go(-1);"><button class="btn btn-info" style="float: right;"><i class="ace-icon fa fa-undo bigger-100"></i>返回</button></a>
					</h1>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<form class="form-horizontal" id="validation-form" novalidate="novalidate" enctype="multipart/form-data">
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">名称:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="name" id="name" class="col-xs-12 col-sm-3">
									</div>
								</div>
							</div>

							<div class="space-2"></div>

 							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="pid">所属分类:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<select class="chosen-select form-control" id="form-field-select-3" name="pid" style="display: none;">
											<option value="">--请选择--</option>
											<?= $class; ?>
										</select>
									</div>
								</div>
							</div>

							<div class="space-2"></div>

 							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="sort">排序:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="sort" id="sort" class="col-xs-12 col-sm-3">
									</div>
								</div>
							</div>

							<div class="space-2"></div>
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
</script>
<script type="text/javascript">
	$('#validation-form').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		rules: {
			name: {
				required: true
			},
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
				url:'/admin/news_class/add',
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
	                setTimeout('window.location.href="/admin/news_class"',1500);
	            }
	        })
		}
	});
</script>
</body>
</html>
