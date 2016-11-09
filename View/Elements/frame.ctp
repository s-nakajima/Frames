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

if ($frame['header_type'] === 'none' && ! Current::isSettingMode()) {
	$panelCss = '';
} elseif (!empty($frame['header_type'])) {
	$panelCss = ' panel panel-' . h($frame['header_type']);
} else {
	$panelCss = ' panel panel-default';
}

if ($this->PageLayout->plugin === 'Pages') {
	$panelCss .= ' nc-content-list';
} else {
	$panelCss .= ' nc-content';
}

if (! isset($displayBackTo)) {
	$displayBackTo = false;
}

if (!empty($centerContent)) {
	$domId = ' id="frame-' . $frame['id'] . '"';
} else {
	$domId = '';
}
?>

<section<?php echo $domId; ?>
		class="frame<?php echo $panelCss . ' plugin-' . strtr($frame['plugin_key'], '_', '-'); ?>">

	<?php if ($frame['name'] || $this->PageLayout->hasBoxSetting($box)) : ?>
		<div class="panel-heading clearfix">
			<?php echo $this->PageLayout->getBlockStatus(true); ?>
			<span>
				<?php echo h($frame['name']); ?>
			</span>

			<?php if ($this->PageLayout->hasBoxSetting($box)): ?>
				<div class="pull-right">
					<?php echo $this->element('Frames.order_form', array('frame' => $frame)); ?>
					<?php echo $this->PageLayout->frameSettingLink($frame); ?>
					<?php echo $this->element('Frames.delete_form', array('frame' => $frame)); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="<?php echo ($panelCss ? 'panel-body ' : ''); ?>block">
		<?php echo $view; ?>

		<?php if ($displayBackTo && ! empty($centerContent)) : ?>
			<div class="frame-footer text-center">
				<?php echo $this->BackTo->listLinkButton($displayBackTo); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
