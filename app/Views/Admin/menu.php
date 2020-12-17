<!-- <div class="sidebar-shortcuts" id="sidebar-shortcuts">
	<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
		<button class="btn btn-success">
			<i class="ace-icon fa fa-signal"></i>
		</button>

		<button class="btn btn-info">
			<i class="ace-icon fa fa-pencil"></i>
		</button>

		<button class="btn btn-warning">
			<i class="ace-icon fa fa-users"></i>
		</button>

		<button class="btn btn-danger">
			<i class="ace-icon fa fa-cogs"></i>
		</button>
	</div>

	<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
		<span class="btn btn-success"></span>

		<span class="btn btn-info"></span>

		<span class="btn btn-warning"></span>

		<span class="btn btn-danger"></span>
	</div>
</div> --><!-- /.sidebar-shortcuts -->
<ul class="nav nav-list">
	<?php if(!empty($menu)){ foreach($menu as $key=>$val){ ?>
	<?php 
	if($_SESSION['Admin_info']['id'] != 1){
	$result = array_intersect($val['child_controller'],$admin_auth); 
	if(!empty($result)){
	?>
	<li class="<?= in_array($Controllername,$val['child_controller']) ? 'active open' : '';?>">
		<a href="<?= empty($val['url']) ? 'javascript:;' : $val['url']; ?>" class="<?= !empty($val['left']) ? 'dropdown-toggle' : ''; ?>">
			<i class="menu-icon <?= $val['icon'];?>"></i>
			<span class="menu-text">
				<?= $val['title'];?>
			</span>
			<b class="arrow <?= !empty($val['left']) ? 'fa fa-angle-down' : ''; ?>"></b>
		</a>
		<b class="arrow"></b>
		<?php if(!empty($val['left'])){ ?>
		<ul class="submenu">
			<?php foreach($val['left'] as $k=>$v){ ?>
			<?php if(in_array($v['controller'],$admin_auth)){?> 
			<li class="<?= in_array($Controllername,array($v['controller'])) && in_array($Methodname, array('index','add','edit','setting','show')) ? 'active' : '';?>">
				<a href="<?= $v['url']; ?>">
					<i class="menu-icon fa fa-caret-right"></i>
					<?= $v['title']; ?>
				</a>
				<b class="arrow"></b>
			</li>
			<?php } ?>
			<?php } ?>
		</ul>
		<?php }?>
	</li>
	<?php } }else{ ?>
		<li class="<?= in_array($Controllername,$val['child_controller']) ? 'active open' : '';?>">
			<a href="<?= empty($val['url']) ? 'javascript:;' : $val['url']; ?>" class="<?= !empty($val['left']) ? 'dropdown-toggle' : ''; ?>">
				<i class="menu-icon <?= $val['icon'];?>"></i>
				<span class="menu-text">
					<?= $val['title'];?>
				</span>
				<b class="arrow <?= !empty($val['left']) ? 'fa fa-angle-down' : ''; ?>"></b>
			</a>
			<b class="arrow"></b>
			<?php if(!empty($val['left'])){ ?> 
			<ul class="submenu">
				<?php foreach($val['left'] as $k=>$v){ ?>
				<li class="<?= in_array($Controllername,array($v['controller'])) && in_array($Methodname, array('index','add','edit','setting','show')) ? 'active' : '';?>">
					<a href="<?= $v['url']; ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						<?= $v['title']; ?>
					</a>
					<b class="arrow"></b>
				</li>
				<?php } ?>
			</ul>
			<?php }?>
		</li>
	<?php } ?>
	<?php } } ?>
</ul><!-- /.nav-list -->