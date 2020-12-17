<?php 
return array(
	0 => array(
		'id'=>1,
		'title'=>'Home',
		'icon'=>'fa fa-tachometer',
		'child_controller'=>array("Index"),
		'url'=>'/Admin',
		'left'=>array()
	),
	1 => array(
		'id'=>2,
		'title'=>'轮播图管理',
		'icon'=>'fa fa-image',
		'child_controller'=>array("Banner","Banner_Space"),
		'left'=>array(
			0 => array(
				'id'=>1,
				'title'=>'轮播图管理',
				'controller'=>'Banner',
				'url'=>'/Admin/Banner'
			),
			1 => array(
				'id'=>2,
				'title'=>'轮播图位置管理',
				'controller'=>'Banner_Space',
				'url'=>'/Admin/Banner_Space'
			)
		)
	),
	2 => array(
		'id'=>3,
		'title'=>'产品管理',
		'icon'=>'fa fa-product-hunt',
		'child_controller'=>array("Product","Product_class"),
		'left'=>array(
			0 => array(
				'id'=>1,
				'title'=>'产品管理',
				'controller'=>'Product',
				'url'=>'/Admin/Product'
			),
			1 => array(
				'id'=>2,
				'title'=>'产品分类管理',
				'controller'=>'Product_class',
				'url'=>'/Admin/Product_class'
			)
		)
	),
	3 => array(
		'id'=>4,
		'title'=>'资讯管理',
		'icon'=>'fa fa-newspaper-o',
		'child_controller'=>array("News","News_class"),
		'left'=>array(
			0 => array(
				'id'=>1,
				'title'=>'资讯管理',
				'controller'=>'News',
				'url'=>'/Admin/News'
			),
			1 => array(
				'id'=>2,
				'title'=>'资讯分类管理',
				'controller'=>'News_class',
				'url'=>'/Admin/News_class'
			)
		)
	),
	4 => array(
		'id'=>5,
		'title'=>'广告管理',
		'icon'=>'fa fa-desktop',
		'child_controller'=>array("Advert","Advert_Space"),
		'left'=>array(
			0 => array(
				'id'=>1,
				'title'=>'广告管理',
				'controller'=>'Advert',
				'url'=>'/Admin/Advert'
			),
			1 => array(
				'id'=>2,
				'title'=>'广告位置管理',
				'controller'=>'Advert_Space',
				'url'=>'/Admin/Advert_Space'
			)
		)
	),
	5 => array(
		'id'=>6,
		'title'=>'单页管理',
		'icon'=>'fa fa-hdd-o',
		'child_controller'=>array("Pages"),
		'left'=>array(
			0 => array(
				'id'=>1,
				'title'=>'单页管理',
				'controller'=>'Pages',
				'url'=>'/Admin/Pages'
			)
		)
	),
	6 => array(
		'id'=>7,
		'title'=>'会员管理',
		'icon'=>'fa fa-users',
		'child_controller'=>array("Member"),
		'left'=>array(
			0 => array(
				'id'=>1,
				'title'=>'会员管理',
				'controller'=>'Member',
				'url'=>'/Admin/Member'
			)
		)
	),
	7 => array(
		'id'=>8,
		'title'=>'管理员',
		'icon'=>'fa fa-user',
		'child_controller'=>array("Account","Account_Group"),
		'left'=>array(
			0 => array(
				'id'=>1,
				'title'=>'管理员管理',
				'controller'=>'Account',
				'url'=>'/Admin/Account'
			),
			1 => array(
				'id'=>2,
				'title'=>'用户组',
				'controller'=>'Account_Group',
				'url'=>'/Admin/Account_Group'
			)
		)
	),
	8 => array(
		'id'=>9,
		'title'=>'网站设置',
		'icon'=>'fa fa-cog',
		'child_controller'=>array("Setting","Links","Logs"),
		'left'=>array(
			0 => array(
				'id'=>1,
				'title'=>'网站设置',
				'controller'=>'Setting',
				'url'=>'/Admin/Setting'
			),
			1 => array(
				'id'=>2,
				'title'=>'友情链接',
				'controller'=>'Links',
				'url'=>'/Admin/Links'
			),
			2 => array(
				'id'=>3,
				'title'=>'日志管理',
				'controller'=>'Logs',
				'url'=>'/Admin/Logs'
			)
		)
	),
);
 ?>