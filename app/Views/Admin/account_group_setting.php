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
						权限组
						<a href="javascript:history.go(-1);"><button class="btn btn-info" style="float: right;"><i class="ace-icon fa fa-undo bigger-100"></i>返回</button></a>
					</h1>
					
				</div>
				<div class="row">
					<div class="col-xs-12">
						<form class="form-horizontal" id="validation-form" novalidate="novalidate">
							<table class="table">
								<tbody>
									<?php if(!empty($auth)){ foreach($auth as $key=>$val){ ?> 
									<tr>
										<td colspan="<?= count($val['left']) < 5 ? 5 : count($val['left']); ?>">
											<label class="pos-rel">
												<input type="checkbox" class="ace <?= $val['controller'].'_'.$val['id']; ?>" name="data[<?= $val['controller']; ?>]" value="<?= $val['controller']; ?>"
												<?= !empty($info[$val['controller']]) ? "checked = 'checked'" : '';?> onclick="check(this)">
												<span class="lbl"><?= $val['title']; ?></span>
											</label>
										</td>
									</tr>
									<?php if(!empty($val['left'])){  ?>
									<tr>
										<?php foreach($val['left'] as $k=>$v){ ?>
										<td>
											<label class="pos-rel">
												<?= str_repeat('&nbsp;&nbsp;',3); ?>
												<input type="checkbox" class="ace <?= $v['controller']; ?>" name="data[<?= $v['controller']; ?>][<?= $v['id']; ?>]" value="<?= $v['controller'].'/'.$v['method']; ?>" <?= !empty($info[$v['controller']]) && in_array($v['controller'].'/'.$v['method'],$info[$v['controller']]) ? "checked = 'checked'" : '';  ?> f_name="<?= $v['controller'].'_'.$val['id']; ?>" onclick="check_child(this)">
												<span class="lbl"><?= $v['title']; ?></span>
											</label>
										</td>
										<?php } ?>
									</tr> 
									<?php } ?>
									<?php }} ?>
								</tbody>
							</table>
							<input type="hidden" name="id" value="<?= $id; ?>">
							<div class="clearfix form-actions">
								<div class="col-md-offset-3 col-md-9">
									<button class="btn btn-info btn-next" data-last="Finish">
										<i class="ace-icon fa fa-check bigger-110"></i>
										Submit
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
	$('#validation-form').validate({
		submitHandler: function (form) {
			var data = $("#validation-form").serialize();
			$.ajax({
				url:'/Admin/Account_Group/setting',
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
            	        duration:1500,
            	        type:'success'
            	    });
	                setTimeout('window.location.href="/Admin/Account_Group"',1500);
	            }else{
	            	$.message({
            	        message:re.msg,
            	        duration:1500,
            	        type:'error'
            	    });
	            }
	        })
		},
	});
</script>
</body>
</html>
