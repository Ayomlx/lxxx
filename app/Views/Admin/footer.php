<div class="footer">
	<div class="footer-inner">
		<div class="footer-content">
			<span class="bigger-120">
				<span class="blue bolder"><?= !empty($web_info['web_name']) ? $web_info['web_name'] : '';?></span>
				<?= !empty($web_info['web_record']) ? $web_info['web_record'] : '';?>
			</span>
		</div>
	</div>
</div>
<div id="logout-message" class="hide">
	<div class="alert alert-info bigger-110">
		确认退出登录？
	</div>
</div>