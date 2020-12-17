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
						友情链接修改
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
										<input type="text" name="title" id="title" class="col-xs-12 col-sm-3" value="<?= $info['title']; ?>">
									</div>
								</div>
							</div>

							
							<div class="space-2"></div>

 							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="url">Url:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="url" id="url" class="col-xs-12 col-sm-3" value="<?= $info['url']; ?>">
									</div>
								</div>
							</div>

							<div class="space-2"></div>

 							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="sort">排序:</label>

								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="sort" id="sort" class="col-xs-12 col-sm-3" value="<?= $info['sort']; ?>">
									</div>
								</div>
							</div>

							<div class="space-2"></div>

 							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="pictrue">图片:</label>

								<div class="col-xs-12 col-sm-3">
									<div class="clearfix">
										<input id="pictrue" type="file" name="pictrue" multiple class="file" data-overwrite-initial="false" data-min-file-count="1">
									</div>
								</div>
							</div>

							<div class="space-2"></div>
							<input type="hidden" name="id" value="<?=$info['id']?>">
							<input type="hidden" name="imgname" value="<?=$info['logo']?>">
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
<link rel="stylesheet" href="/public/fileinput/css/fileinput.min.css">
<script type="text/javascript">
	$('#validation-form').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		rules: {
			title: {
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
				url:'/Admin/Links/edit',
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
	                setTimeout('window.location.href="/Admin/Links"',1500);
	            }
	        })
		}
	});
	var djson  = '<?php echo $json_info; ?>';
	var reData = eval(djson);
	var preList = new Array();
	preList[0] = "<img src=\""+reData[0]+"\" class=\"file-preview-image\" width='319'>";
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
        uploadUrl: '/Upload/upload?type=links', // you must set a valid URL here else you will get an error
        allowedFileTypes : ['jpg', 'jpeg', 'png','gif'],
        removeClass: "btn btn-danger",
        autoReplace: true,
        overwriteInitial: false,
        maxFileSize: 5*1024,
        maxFileCount: 1,
        showClose: false,
        previewSettings: {
            image: {width: "100%", height: "100%"},
        },
        initialPreview: previewJson,
        previewFileIcon: '<i class="fa fa-file"></i>',
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
        initialPreviewConfig: preConfigList,
        initialPreviewShowDelete:true,
        msgFilesTooMany:"选择上传的文件数量({n})超过允许的最大数值{M}！",
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
	$("#pictrue").on("filebatchselected", function(event, files) {
		$(".file-initial-thumbs").remove();
	});
</script>
</body>
</html>
