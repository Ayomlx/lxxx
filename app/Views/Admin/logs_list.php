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
						日志管理
					</div>
					<div>
					<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
						<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
						<thead>
							<tr role="row">
								<th class="center" rowspan="1" colspan="1" aria-label="">ID</th>
								<th class="center">URL</th>
								<th class="center">类型</th>
								<th class="center">管理员</th>
								<th class="center">时间</th>
								<th class="center">操作</th>
							</tr>
						</thead>
						<tbody style="text-align: center;">

						</tbody>
						</table>
					</div>
					</div>
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
		$(function () {
		    var myTable = $('#dynamic-table').DataTable({
		    	"pageLength": 10,//需要每页显示的条数 
		    	"ajax":{
		    		"url":'/Admin/Logs',
		    		"type":"POST",
		    	},
		    	"aoColumnDefs": [ { "bSortable": false, "aTargets": [ 3, 5 ] }],
		    	"aaSorting": [[4,"desc"]],
		    	"aoColumns":[
		    		{"data":"field0"},
		    		{"data":"field1"},
		    		{"data":"field2"},
		    		{"data":"field3"},
		    		{"data":"field4"},
		    		{"data":"field5"}
		    	]
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
	</script>
</body>
</html>
