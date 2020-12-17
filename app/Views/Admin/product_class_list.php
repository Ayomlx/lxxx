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
				<div class="breadcrumbs ace-save-state" id="breadcrumbs">
					<?php include('nav.php'); ?>
				</div>

				<div class="page-content">
					<!-- search -->
					<!-- search end -->
					<div class="table-header">
						产品分类管理
						<a href="/admin/product_class/add"><span class="btn btn-info btn-sm popover-info" style="float: right;margin-top: 2px;margin-right: 20px;"><i class="ace-icon fa fa-plus" data-icon-show="fa-plus" data-icon-hide="fa-minus"></i>添加分类</span></a>
					</div>
					<div>
						<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
						    <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
								<thead>
									<tr role="row">
										<th class="center" rowspan="1" colspan="1" aria-label="">
											<label class="pos-rel">
												<input type="checkbox" class="ace">
												<span class="lbl"></span>
											</label>
										</th>
										<th class="center">名称</th>
										<th class="center">排序</th>
										<th class="center">操作</th>
									</tr>
								</thead>
						      	<tbody class="x-cate">
						      		<?= $str; ?>
						      	</tbody>
						    </table>
						</div>
					</div>
					<div style="float: right;position: relative;top: -58px;right: 77px;"><?= $pager->links(); ?></div>
				</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->
		<?php include('footer.php'); ?>
	</div><!-- /.main-container -->
	<?php include('dialog_msg.php'); ?>
	<?php include('basic.php'); ?>
	<script src="/public/assets/js/dataTables.buttons.min.js"></script>
	<script src="/public/assets/js/buttons.html5.min.js"></script>
	<script src="/public/assets/js/dataTables.select.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$(function () {
			    var myTable = $('#dynamic-table').DataTable({
			    	"bPaginate":false
			    });
			    myTable.columns().flatten().each( function ( colIdx ) {
			    	var select = $('<select />')
			    	    .appendTo(
			    	        myTable.column(colIdx).footer()
			    	    )
			    	    .on( 'change', function () {
			    	        myTable
			    	            .column( colIdx )
			    	            .search( $(this).val() )
			    	            .draw();
			    	    } );
			    });

			    myTable.on( 'select', function ( e, dt, type, index ) {
			    	if ( type === 'row' ) {
			    		$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
			    	}
			    } );
			    myTable.on( 'deselect', function ( e, dt, type, index ) {
			    	if ( type === 'row' ) {
			    		$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
			    	}
			    } );
			   
			    /////////////////////////////////
			    //table checkboxes
			    $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
			    
			    //select/deselect all rows according to table header checkbox
			    $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
			    	var th_checked = this.checked;//checkbox inside "TH" table header
			    	
			    	$('#dynamic-table').find('tbody > tr').each(function(){
			    		var row = this;
			    		if(th_checked) myTable.row(row).select();
			    		else  myTable.row(row).deselect();
			    	});
			    });
			    
			});
		  //$("tbody.x-cate tr[fid!='0']").hide();
		  // 栏目多级显示效果
		  $('.x-show').click(function () {
		      if($(this).attr('status')=='true'){
		          $(this).attr('status','false');
		          cateId = $(this).parents('tr').attr('cate-id');
		          $("tbody tr[fid="+cateId+"]").show();
		     }else{
		          cateIds = [];
		          $(this).attr('status','true');
		          cateId = $(this).parents('tr').attr('cate-id');
		          getCateId(cateId);
		          for (var i in cateIds) {
		              $("tbody tr[cate-id="+cateIds[i]+"]").hide().find('.x-show').attr('status','true');
		          }
		     }
		  });
		  var cateIds = [];
		  function getCateId(cateId) {
		      $("tbody tr[fid="+cateId+"]").each(function(index, el) {
		          id = $(el).attr('cate-id');
		          cateIds.push(id);
		          getCateId(id);
		      });
		  }
		});
		

		function del(id){
			$.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
				_title: function(title) {
					var $title = this.options.title || '&nbsp;'
					if( ("title_html" in this.options) && this.options.title_html == true )
						title.html($title);
					else title.text($title);
				}
			}));
			var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
				modal: true,
				title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> 确认删除</h4></div>",
				title_html: true,
				buttons: [ 
					{
						text: "OK",
						"class" : "btn btn-primary btn-minier",
						click: function() {
							$.ajax({
								url:'/admin/product_class/del',
								type:'POST',
								async:false,
								datatype:'json',
								data:{id:id},
							})
							.done(function(r) {
								$( "#dialog-message" ).dialog( "close" ); 
								var re = JSON.parse(r);
					            if(re.code == 0){
					            	$.message({
				            	        message:re.msg,
				            	        type:'success'
				            	    });
					                setTimeout(window.location.reload(),1500);
					            }else{
					            	$.message({
				            	        message:re.msg,
				            	        type:'error'
				            	    });
					            }
					        });
						} 
					},
					{
						text: "Cancel",
						"class" : "btn btn-minier",
						click: function() {
							$( this ).dialog( "close" ); 
						} 
					}
				]
			});
		}
	</script>
</body>
</html>