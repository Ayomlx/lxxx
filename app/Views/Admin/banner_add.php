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
						轮播图添加
						<a href="javascript:history.go(-1);"><button class="btn btn-info" style="float: right;"><i class="ace-icon fa fa-undo bigger-100"></i>返回</button></a>
					</h1>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<form class="form-horizontal" id="validation-form" novalidate="novalidate" enctype="multipart/form-data">
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="title">标题:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="title" id="title" class="col-xs-12 col-sm-3">
									</div>
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 位置 </label>

								<div class="col-xs-12 col-sm-9">
									<select class="chosen-select form-control" id="form-field-select-3" name="space_id" style="display: none;">
										<option value="">-请选择-</option>
										<?php foreach($space as $key=>$val){ ?>
											<option value="<?= $val['id']; ?>"><?= $val['title']; ?></option>
										<?php }?>
									</select>
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="keyworlds">关键字:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="keyworlds" id="keyworlds" class="col-xs-12 col-sm-3">
									</div>
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="description">描述:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<textarea name="description" cols="41" rows="5"></textarea>
									</div>
								</div>
							</div>

							<div class="space-2"></div>

 							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="url">Url:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="url" id="url" class="col-xs-12 col-sm-3">
									</div>
								</div>
							</div>

							<div class="space-2"></div>

 							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="sort">排序:</label>

								<div class="col-xs-12 col-sm-5">
									<div class="clearfix">
										<input type="text" name="sort" id="sort" class="col-xs-12 col-sm-3">
									</div>
								</div>
							</div>

							<div class="space-2"></div>

 							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="pictrue">图片:</label>

								<div class="col-xs-12 col-sm-5">
									<div class="clearfix">
										<input id="pictrue" type="file" name="pictrue" multiple class="file" data-overwrite-initial="false" data-min-file-count="1">
									</div>
								</div>
							</div>

							<div class="space-2"></div>
							<input type="hidden" name="imgname" value="">
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
		errorPlacement: function(error, element) {
			error.appendTo(element.parent());
		},
		errorElement: 'em',
		errorClass: 'error',
		ignore: ":hidden:not(select)",
		rules: {
			title: {
				required: true
			},
			space_id: {
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
				url:'/admin/banner/add',
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
	                setTimeout('window.location.href="/admin/banner"',1500);
	            }
	        })
		}
	});

    $("#pictrue").fileinput({
    	language: 'zh',
        uploadUrl: '/Upload/upload?type=banner', // you must set a valid URL here else you will get an error
        allowedFileTypes : ['jpg', 'png','gif'],
        autoReplace:true,
        overwriteInitial: false,
        maxFileSize: 20*1024,
        maxFileCount: 1,
        showClose: false,
        fileActionSettings: {                               // 在预览窗口中为新选择的文件缩略图设置文件操作的对象配置
            showRemove: false,                                   // 显示删除按钮
            showUpload: false,                                   // 显示上传按钮
            showDownload: false,                            // 显示下载按钮
            showZoom: true,                                    // 显示预览按钮
            showDrag: false,                                        // 显示拖拽
            removeIcon: '<i class="fa fa-trash"></i>',   // 删除图标 
            uploadIcon: '<i class="fa fa-upload"></i>',     // 上传图标
            uploadRetryIcon: '<i class="fa fa-repeat"></i>'  // 重试图标
        },
        //allowedFileTypes: ['image', 'video', 'flash'],
	});
	$('#pictrue').on('fileuploaded', function(event, data, previewId, index) {   
		var img = data.jqXHR.responseJSON;
		$('input[name="imgname"]').val(img);
	});
	$('#pictrue').on('fileerror', function(event, data, previewId, index) {   
		window.location.reload();
	});
	$("#pictrue").on("filecleared",function(event, data, msg){
		$('input[name="imgname"]').val('');
	});
</script>
</body>
</html>
