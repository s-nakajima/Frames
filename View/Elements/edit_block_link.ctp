<?php
if (Configure::read('Pages.isSetting')) {
 $url = '/'.$frame['Plugin']['folder'].'/'
	.$frame['Plugin']['folder'].'/'
	.'block_setting'.'/'
	.$frame['Frame']['id'].'/';
?>
<div ng-controller="PagesBlockSetting">
<button
	type="button"
	class="btn btn-default pull-right"
	ng-click="PagesBlockSettingShow(<?php echo intval($frame['Frame']['plugin_id']); ?> , <?php echo intval($frame['Frame']['id']); ?> , '<?php echo $url ?>')">
	<span class="glyphicon glyphicon-cog"></span>
	<span><?php echo __('Block setting'); ?></span>
</button>

	<!-- 設定枠 -->
	<div class="modal fade modal-" id="frame-setting-show_<?php echo intval($frame['Frame']['id']); ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4>{{PlaginName}}<?php echo __('プラグイン設定');?></h4>
				</div>
				<div class="modal-body">

				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
</div>

<div style="clear:both"></div>
<?php } ?>
