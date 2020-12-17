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
					<?php #include('search.php');?>
					<div class="row">
						<div class="col-xs-12">
							<div class="alert alert-block alert-success">
								欢迎管理员：
								<span class="x-red"><?= $_SESSION['Admin_info']['username']; ?></span>！当前时间:<span id="today"><?= date('Y-m-d H:i:s',time()); ?></span>
							</div>
							<div class="hr dotted"></div>
							<div class="col-xs-12">
								<div class="space-6"></div>
								<div>
									<a href="/admin/Banner">
										<span class="btn btn-app btn-light no-hover">
											<span class="line-height-1 bigger-170 blue"> <?= !empty($data['banner']) ? $data['banner'] : 0; ?> </span>
											<br>
											<span class="line-height-1 smaller-90"> 轮播图 </span>
										</span>
									</a>
									<a href="/admin/Product">
										<span class="btn btn-app btn-yellow no-hover">
											<span class="line-height-1 bigger-170"> <?= !empty($data['product']) ? $data['product'] : 0; ?> </span>
											<br>
											<span class="line-height-1 smaller-90"> 产品 </span>
										</span>
									</a>
									<a href="/admin/news">
										<span class="btn btn-app btn-pink no-hover">
											<span class="line-height-1 bigger-170"> <?= !empty($data['new']) ? $data['new'] : 0; ?> </span>
											<br>
											<span class="line-height-1 smaller-90"> 资讯 </span>
										</span>
									</a>
									<a href="/admin/advert">
										<span class="btn btn-app btn-grey no-hover">
											<span class="line-height-1 bigger-170"> <?= !empty($data['advert']) ? $data['advert'] : 0; ?> </span>
											<br>
											<span class="line-height-1 smaller-90"> 广告 </span>
										</span>
									</a>
									<a href="/admin/member">
										<span class="btn btn-app btn-success no-hover">
											<span class="line-height-1 bigger-170"> <?= !empty($data['member']) ? $data['member'] : 0; ?> </span>
											<br>
											<span class="line-height-1 smaller-90"> 会员 </span>
										</span>
									</a>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="space-6"></div>
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name"> 网站名称 </div>

										<div class="profile-info-value">
											<span class="editable" id="webname"><?= !empty($web_info['web_name']) ? $web_info['web_name'] : ''; ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> 网站标题 </div>

										<div class="profile-info-value">
											<span class="editable" id="webtitle"><?= !empty($web_info['web_title']) ? $web_info['web_title'] : ''; ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> 公司名称 </div>

										<div class="profile-info-value">
											<span class="editable" id="company_name"><?= !empty($web_info['company_name']) ? $web_info['company_name'] : ''; ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> 公司地址 </div>

										<div class="profile-info-value">
											<span class="editable" id="company_address"><?= !empty($web_info['company_address']) ? $web_info['company_address'] : ''; ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> 备案信息 </div>

										<div class="profile-info-value">
											<span class="editable" id="web_copyright"><?= !empty($web_info['web_copyright']) ? $web_info['web_copyright'] : ''; ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> 版权所有 </div>

										<div class="profile-info-value">
											<span class="editable" id="web_record"><?= !empty($web_info['web_record']) ? $web_info['web_record'] : ''; ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- /.row -->
				</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->

		<?php include('footer.php'); ?>
	</div><!-- /.main-container -->
	<?php include('basic.php'); ?>
	<script type="text/javascript">
		jQuery(function($){
			$.fn.editable.defaults.mode = 'inline';
			$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
		    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
			                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>'; 
		    $('#webname').editable({
				type: 'text',
				name: 'web_name',
				pk: 1,
				url: 'admin/index/edit_file',
				success:function(data){
					var r = JSON.parse(data);
					$.message({
            	        message:r.msg,
            	        type:'success',
            	        duration:1500
            	    });
				},
				error:function(data){
					var r = JSON.parse(data);
					$.message({
            	        message:r.msg,
            	        type:'error',
            	        duration:1500
            	    });
				}
		    });
		    $('#webtitle').editable({
				type: 'text',
				name: 'web_title',
				pk: 1,
				url: 'admin/index/edit_file',
				success:function(data){
					var r = JSON.parse(data);
					$.message({
            	        message:r.msg,
            	        type:'success',
            	        duration:1500
            	    });
				},
				error:function(data){
					var r = JSON.parse(data);
					$.message({
            	        message:r.msg,
            	        type:'error',
            	        duration:1500
            	    });
				}
		    });
		    $('#company_name').editable({
				type: 'text',
				name: 'company_name',
				pk: 1,
				url: 'admin/index/edit_file',
				success:function(data){
					var r = JSON.parse(data);
					$.message({
            	        message:r.msg,
            	        type:'success',
            	        duration:1500
            	    });
				},
				error:function(data){
					var r = JSON.parse(data);
					$.message({
            	        message:r.msg,
            	        type:'error',
            	        duration:1500
            	    });
				}
		    });
		    $('#company_address').editable({
				type: 'text',
				name: 'company_title',
				pk: 1,
				url: 'admin/index/edit_file',
				success:function(data){
					var r = JSON.parse(data);
					$.message({
            	        message:r.msg,
            	        type:'success',
            	        duration:1500
            	    });
				},
				error:function(data){
					var r = JSON.parse(data);
					$.message({
            	        message:r.msg,
            	        type:'error',
            	        duration:1500
            	    });
				}
		    });
		    $('#web_copyright').editable({
				type: 'text',
				name: 'web_copyright',
				pk: 1,
				url: 'admin/index/edit_file',
				success:function(data){
					var r = JSON.parse(data);
					$.message({
            	        message:r.msg,
            	        type:'success',
            	        duration:1500
            	    });
				},
				error:function(data){
					var r = JSON.parse(data);
					$.message({
            	        message:r.msg,
            	        type:'error',
            	        duration:1500
            	    });
				}
		    });
		    $('#web_record').editable({
				type: 'text',
				name: 'web_record',
				pk: 1,
				url: 'admin/index/edit_file',
				success:function(data){
					var r = JSON.parse(data);
					$.message({
            	        message:r.msg,
            	        type:'success',
            	        duration:1500
            	    });
				},
				error:function(data){
					var r = JSON.parse(data);
					$.message({
            	        message:r.msg,
            	        type:'error',
            	        duration:1500
            	    });
				}
		    });
		});
	</script>
</body>
</html>
