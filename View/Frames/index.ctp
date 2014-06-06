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
$ActionView = $this->requestAction($frame['Plugin']['folder'] . DS . $frame['Plugin']['folder'] . DS . 'index' . DS . $frame['Frame']['id'], array('return'));
if($ActionView || Configure::read('Pages.isSetting')) {
?>

<div class="frame frame-id-<?php echo $frame['Frame']['id']; ?>">
	<div class="block block-id-<?php echo $frame['Frame']['block_id']; ?>">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo $frame['Language'][0]['FramesLanguage']['name']; ?>
				<?php echo $this->element('edit_frame_link'); ?>
			</div>
			<div class="panel-body">
				<?php echo $this->element('edit_block_link'); ?>
				<?php echo $ActionView;  ?>
			</div>
		</div>
	</div>

</div>
<?php } ?>
