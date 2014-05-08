<?php
/**
 * Frames Template
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */
?>

<div class="frame frame-id-<?php echo $frame['Frame']['id']; ?>">
	<div class="block block-id-<?php echo $frame['Frame']['block_id']; ?>"">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo $frame['Language'][0]['FramesLanguage']['name']; ?></div>
			<div class="panel-body">
				<?php echo 'Frameのid:' . $frame['Frame']['id']; ?>
				<?php echo $this->requestAction($frame['Plugin']['folder'], array('return')); ?>
			</div>
		</div>
	</div>
</div>
