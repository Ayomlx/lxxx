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
						网站设置
						<a href="javascript:history.go(-1);"><button class="btn btn-info" style="float: right;"><i class="ace-icon fa fa-undo bigger-100"></i>返回</button></a>
					</h1>
					
				</div>
				<div class="row">
					<div class="col-xs-12">
						<form class="form-horizontal" id="validation-form" novalidate="novalidate">
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="web_name">网站名称:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="web_name" id="web_name" class="col-xs-12 col-sm-3" value="<?= !empty($info['web_name']) ? $info['web_name'] : ''; ?>">
									</div>
								</div>
							</div>
							
							<div class="space-2"></div>

 							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="web_title">网站标题:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="web_title" id="web_title" class="col-xs-12 col-sm-3" value="<?= !empty($info['web_title']) ? $info['web_title'] : ''; ?>">
									</div>
								</div>
							</div>

							<div class="space-2"></div>

 							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="pictrue">Logo:</label>

								<div class="col-xs-12 col-sm-3">
									<div class="clearfix">
										<input id="pictrue" type="file" name="pictrue" multiple class="file">
									</div>
								</div>
							</div>

							<div class="space-2"></div>

 							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="qrcode">二维码:</label>

								<div class="col-xs-12 col-sm-3">
									<div class="clearfix">
										<input id="qrcode" type="file" name="qrcode" multiple class="file">
									</div>
								</div>
							</div>

							<div class="space-2"></div>
							
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="web_keywords">关键字:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="web_keywords" id="web_keywords" class="col-xs-12 col-sm-3" value="<?= !empty($info['web_keywords']) ? $info['web_keywords'] : ''; ?>">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="web_description">描述:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<textarea class="col-xs-12 col-sm-3" name="web_description"><?= !empty($info['web_description']) ? $info['web_description'] : ''; ?></textarea>
									</div>
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="company_name">公司名称:</label>
								<div class="col-sm-9">
									<input type="text" id="company_name" name="company_name" class="col-xs-12 col-sm-3" value="<?= !empty($info['company_name']) ? $info['company_name'] : '';?>">
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="company_address">公司地址:</label>
								<div class="col-sm-9">
									<input type="text" id="company_address" name="company_address" class="col-xs-12 col-sm-3" value="<?= !empty($info['company_address']) ? $info['company_address'] : '';?>">
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="web_copyright">备案信息:</label>
								<div class="col-sm-9">
									<input type="text" id="web_copyright" name="web_copyright" class="col-xs-12 col-sm-3" value="<?= !empty($info['web_copyright']) ? $info['web_copyright'] : '';?>">
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="web_record">版权所有:</label>
								<div class="col-sm-9">
									<input type="text" id="web_record" name="web_record" class="col-xs-12 col-sm-3" value="<?= !empty($info['web_record']) ? $info['web_record'] : '';?>">
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="web_tel">资讯热线:</label>
								<div class="col-sm-9">
									<input type="text" id="web_tel" name="web_tel" class="col-xs-12 col-sm-3" value="<?= !empty($info['web_tel']) ? $info['web_tel'] : '';?>">
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="web_email">邮箱:</label>
								<div class="col-sm-9">
									<input type="text" id="web_email" name="web_email" class="col-xs-12 col-sm-3" value="<?= !empty($info['web_email']) ? $info['web_email'] : '';?>">
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="web_qq">QQ:</label>
								<div class="col-sm-9">
									<input type="text" id="web_qq" name="web_qq" class="col-xs-12 col-sm-3" value="<?= !empty($info['web_qq']) ? $info['web_qq'] : '';?>">
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="web_is_close">是否闭站:</label>
								<div class="col-sm-9">
									<label>
										<input type="checkbox" name="web_is_close" class="ace ace-switch ace-switch-4 btn-flat" <?= $info['web_is_close'] == 1 ? 'checked' : ''; ?> />
										<span class="lbl"></span>
									</label>
								</div>
							</div>

							<div class="space-2"></div>

							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="web_close_tips">闭站提示:</label>
								<div class="col-sm-9">
									<textarea class="col-xs-12 col-sm-3" name="web_close_tips"><?= !empty($info['web_close_tips']) ? $info['web_close_tips'] : ''; ?></textarea>
								</div>
							</div>

							<div class="space-2"></div>
							<input type="hidden" name="imgname" value="<?= !empty($info['web_logo']) ? $info['web_logo'] : '';?>">
							<input type="hidden" name="qrcode_name" value="<?= !empty($info['web_qrcode']) ? $info['web_qrcode'] : '';?>">
							<div class="clearfix form-actions">
								<div class="col-md-offset-3 col-md-9">
									<button class="btn btn-info btn-next" data-last="Finish">
										<i class="ace-icon fa fa-check bigger-110"></i>
										Save
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
				url:'/Admin/Setting/save',
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
	                setTimeout('window.location.href="/Admin/Setting"',1500);
	            }
	        })
		},
	});

	var djson  = '<?php echo $json_info; ?>';
	var reData = eval(djson);
	var preList = new Array();
	preList[0] = "<img src=\""+reData[0]+"\" class=\"file-preview-image\" width='300'>";
	var previewJson = preList;
	var preConfigList = new Array();
	var tjson = {caption: reData[0], // 展示的文件名
		size:1024,
		width: '100px',
		url: '/admin/banner/del_pictrue', // 删除url
		key: reData[1], // 删除是Ajax向后台传递的参数
		extra: {id: reData[1]}
	};
	preConfigList[0] = tjson;
    $("#pictrue").fileinput({
    	language: 'zh',
        uploadUrl: '/Upload/Upload?type=web_setting', // you must set a valid URL here else you will get an error
        allowedFileTypes : ['jpg', 'jpeg', 'png','gif'],
        removeClass: "btn btn-danger",
        autoReplace: true,
        overwriteInitial: true,
        maxFileSize: 5*1024,
        maxFileCount: 1,
        showClose: false,
        initialPreview: previewJson,
        previewFileIcon: '<i class="fa fa-file"></i>',
        fileActionSettings: {                               // 在预览窗口中为新选择的文件缩略图设置文件操作的对象配置
            showRemove: true,                                   // 显示删除按钮
            showUpload: true,                                   // 显示上传按钮
            showDownload: false,                            // 显示下载按钮
            showZoom: false,                                    // 显示预览按钮
            showDrag: false,                                        // 显示拖拽
            removeIcon: '<i class="fa fa-trash"></i>',   // 删除图标 
            uploadIcon: '<i class="fa fa-upload"></i>',     // 上传图标
            uploadRetryIcon: '<i class="fa fa-repeat"></i>'  // 重试图标
        },
        initialPreviewConfig: preConfigList,
        initialPreviewShowDelete:true
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
    /*$("#pictrue").on("filebatchselected", function(event, files) {
    	$(".file-initial-thumbs").remove();
    });*/
</script>
<script type="text/javascript">
	var _djson  = '<?php echo $qr_json_info; ?>';
	var _reData = eval(_djson);
	var _preList = new Array();
	_preList[0] = "<img src=\""+_reData[0]+"\" class=\"file-preview-image\" width='300'>";
	var _previewJson = _preList;
	var _preConfigList = new Array();
	var _tjson = {caption: _reData[0], // 展示的文件名
		size:1024,
		width: '100px',
		url: '/admin/banner/del_pictrue', // 删除url
		key: _reData[1], // 删除是Ajax向后台传递的参数
		extra: {id: _reData[1]}
	};
	_preConfigList[0] = _tjson;
    $("#qrcode").fileinput({
    	language: 'zh',
        uploadUrl: '/Upload/Uploads?type=web_setting', // you must set a valid URL here else you will get an error
        uploadAsync:true,
        allowedFileTypes : ['jpg', 'jpeg', 'png','gif'],
        removeClass: "btn btn-danger",
        autoReplace: true,
        overwriteInitial: true,
        maxFileSize: 5*1024,
        maxFileCount: 1,
        showClose: false,
        initialPreview: _previewJson,
        previewFileIcon: '<i class="fa fa-file"></i>',
        fileActionSettings: {                               // 在预览窗口中为新选择的文件缩略图设置文件操作的对象配置
            showRemove: true,                                   // 显示删除按钮
            showUpload: true,                                   // 显示上传按钮
            showDownload: false,                            // 显示下载按钮
            showZoom: false,                                    // 显示预览按钮
            showDrag: false,                                        // 显示拖拽
            removeIcon: '<i class="fa fa-trash"></i>',   // 删除图标 
            uploadIcon: '<i class="fa fa-upload"></i>',     // 上传图标
            uploadRetryIcon: '<i class="fa fa-repeat"></i>'  // 重试图标
        },
        initialPreviewConfig: _preConfigList,
        initialPreviewShowDelete:true
        //allowedFileTypes: ['image', 'video', 'flash'],
	});
    $('#qrcode').on('fileuploaded', function(event, data, previewId, index) {   
    	var img = data.jqXHR.responseJSON;
    	$('input[name="qrcode_name"]').val(img);
    });
    $('#qrcode').on('fileerror', function(event, data, previewId, index) {   
    	window.location.reload();
    });
    $("#qrcode").on("filecleared",function(event, data, msg){
    	$('input[name="qrcode_name"]').val('');
    });
   /* $("#qrcode").on("filebatchselected", function(event, files) {
    	$(".file-initial-thumbs").remove();
    });
*/    
</script>
</body>
</html>
