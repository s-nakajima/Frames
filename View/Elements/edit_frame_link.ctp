<?php
if (Configure::read('Pages.isSetting')) {
	?><div class="pull-right">
	<button class="btn btn-default">
		<span class="glyphicon glyphicon-arrow-up"></span>
		<span class="hidden"><?php echo __('up'); ?></span>
	</button>

	<button class="btn btn-default">
		<span class="glyphicon glyphicon-arrow-down"></span>
		<span class="hidden"><?php echo __('down'); ?></span>
	</button>

	<button
		class="btn btn-default"
		>
		<span class="glyphicon glyphicon-cog"></span>
		<span class="hidden"><?php echo __('flame setting'); ?></span>
	</button>
	<!-- 閉じる-->
	<button
		class="btn btn-default"
		ng-click="deleteFrame(<?php echo $frame['Frame']['id']; ?>)"
	>
		<span class="glyphicon glyphicon-remove"></span>
		<span class="hidden"><?php echo __("閉じる"); ?></span>
	</button>

	</div>

<?php
}
?>
<div style="clear:both"></div>