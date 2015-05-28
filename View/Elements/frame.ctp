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

<section class="frame panel panel-<?php echo h($frame['headerType']); ?>">

	<div class="panel-heading clearfix">
		<span>
			<?php echo $frame['name']; ?>
		</span>

		<?php if (Page::isSetting()): ?>
			<div class="pull-right">
				<?php echo $this->element('Frames.order_form', array('frame' => $frame)); ?>

				<?php if (isset($pluginMap[$frame['pluginKey']]['defaultSettingAction']) && $pluginMap[$frame['pluginKey']]['defaultSettingAction'] !== '') : ?>
					<button class="btn btn-default frame-btn pull-left"
							onclick="location.href='/<?php echo $frame['pluginKey'] . '/' . $pluginMap[$frame['pluginKey']]['defaultSettingAction'] . '/' . $frame['id']; ?>'">
						<span class="glyphicon glyphicon-cog"></span>
						<span class="sr-only"><?php echo __d('frames', 'Show flame setting'); ?></span>
					</button>
				<?php endif; ?>

				<?php echo $this->element('Frames.delete_form', array('frame' => $frame)); ?>
			</div>
		<?php endif; ?>
	</div>

	<div class="panel-body block">
		<?php echo $view; ?>
	</div>
</section>
