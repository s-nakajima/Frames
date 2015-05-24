<?php
/**
 * Element of frame.
 *  - $frame: The frame data
 *  - $view: The plugin view
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */
?>

<section id="frame-wrap-<?php echo $frame['id']; ?>"
	class="frame panel panel-<?php echo h($frame['headerType']); ?>"
	ng-controller="FramesController" ng-hide="deleted">

	<div class="panel-heading clearfix">
		<span>
			<?php echo $frame['name']; ?>
		</span>

		<?php if (Page::isSetting()): ?>
			<div class="pull-right">
				<button class="btn btn-default">
					<span class="glyphicon glyphicon-arrow-up"></span>
					<span class="sr-only"><?php echo __d('frames', 'Up frame position'); ?></span>
				</button>

				<button class="btn btn-default">
					<span class="glyphicon glyphicon-arrow-down"></span>
					<span class="sr-only"><?php echo __d('frames', 'Down frame position'); ?></span>
				</button>

				<button class="btn btn-default" onclick="location.href='/<?php echo $frame['pluginKey'] . DS . 'blocks' . DS . 'index' . DS . $frame['id']; ?>'">
					<span class="glyphicon glyphicon-cog"></span>
					<span class="sr-only"><?php echo __d('frames', 'Show flame setting'); ?></span>
				</button>

				<button class="btn btn-default" ng-click="delete(<?php echo $frame['id']; ?>)">
					<span class="glyphicon glyphicon-remove"></span>
					<span class="sr-only"><?php echo __d('frames', 'Delete frame'); ?></span>
				</button>
			</div>
		<?php endif; ?>
	</div>

	<div class="panel-body block">
		<?php echo $view; ?>
	</div>
</section>
