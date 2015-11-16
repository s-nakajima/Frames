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

<section class="frame panel panel-<?php echo !empty($frame['header_type']) ? h($frame['header_type']) : 'default'; ?>">

	<?php if ($frame['name'] || Current::isSettingMode()) : ?>
		<div class="panel-heading clearfix">
			<span>
				<?php echo $frame['name']; ?>
			</span>

			<?php if (Current::isSettingMode()): ?>
				<div class="pull-right">
					<?php echo $this->element('Frames.order_form', array('frame' => $frame)); ?>

					<?php if ($action = $this->PageLayout->getDefaultSettingAction($frame['plugin_key'])) : ?>
						<a class="btn btn-default frame-btn pull-left"
						   href="<?php echo $this->NetCommonsHtml->url('/' . $frame['plugin_key'] . '/' . $action . '?frame_id=' . $frame['id']); ?>">
							<span class="glyphicon glyphicon-cog"> </span>
							<span class="sr-only"><?php echo __d('frames', 'Show flame setting'); ?></span>
						</a>
					<?php endif; ?>

					<?php echo $this->element('Frames.delete_form', array('frame' => $frame)); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="panel-body block">
		<?php echo $view; ?>
	</div>
</section>
