<?php
/**
 * Render frames element.
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

echo $this->Html->script('http://rawgit.com/angular/bower-angular-sanitize/v1.2.25/angular-sanitize.js', false);
echo $this->Html->script('http://rawgit.com/m-e-conroy/angular-dialog-service/v5.2.0/src/dialogs.js', false);
echo $this->Html->script('/frames/js/frames.js', false);

foreach ($frames as $frame):
	if (strlen($frame['plugin_key']) === 0) {
		continue;
	}

	$url = $frame['plugin_key'] . DS . $frame['plugin_key'] . DS . 'index' . DS . $frame['id'];
	if (Page::isSetting()) {
		$url = Page::SETTING_MODE_WORD . DS . $url;
	}

	$view = $this->requestAction($url, array('return'));

	if (!Page::isSetting() &&
			strlen($view) === 0) {
		continue;
	}
?>

<div id="frame-wrap-<?php echo $frame['id']; ?>" class="frame frame-id-<?php echo $frame['id']; ?>" ng-controller="FramesController" ng-hide="deleted">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<span>
					<?php echo $frame['name']; ?>
				</span>
				<?php if (Page::isSetting()): ?>
					<div class="pull-right">
						<button class="btn btn-default">
							<span class="glyphicon glyphicon-arrow-up"></span>
							<span class="sr-only"><?php echo __('Up frame position'); ?></span>
						</button>

						<button class="btn btn-default">
							<span class="glyphicon glyphicon-arrow-down"></span>
							<span class="sr-only"><?php echo __('Down frame position'); ?></span>
						</button>

						<button class="btn btn-default">
							<span class="glyphicon glyphicon-cog"></span>
							<span class="sr-only"><?php echo __('Show flame setting'); ?></span>
						</button>

						<button class="btn btn-default" ng-click="delete(<?php echo $frame['id']; ?>)">
							<span class="glyphicon glyphicon-trash"></span>
							<span class="sr-only"><?php echo __('Delete frame'); ?></span>
						</button>
					</div>
				<?php endif; ?>
			</div>

			<div class="panel-body">
				<div class="block block-id-<?php echo $frame['block_id']; ?>">
					<?php echo $view;  ?>
				</div>
			</div>
		</div>
	</div>
<?php endforeach;
