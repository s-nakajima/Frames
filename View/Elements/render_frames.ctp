<?php
/**
 * Render frames element.
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@netcommons.org>
 * @since 3.0.0.0
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

foreach ($frames as $frame):
	$ActionView = '';
	if (!empty($frame['Plugin']['folder'])) {
		$ActionView = $this->requestAction($frame['Plugin']['folder'] . DS . $frame['Plugin']['folder'] . DS . 'index' . DS . $frame['id'], array('return'));
	}

	if (!Configure::read('Pages.isSetting')
		&& strlen($ActionView) == 0) {
		continue;
	}
?>
	<div id="frame-wrap-<?php echo $frame['id']; ?>" class="frame frame-id-<?php echo $frame['id']; ?>">
		<div class="block block-id-<?php echo $frame['block_id']; ?>">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo $frame['Language'][0]['FramesLanguage']['name']; ?>
					<?php echo $this->element('Frames.edit_frame_link', array('frame' => $frame)); ?>
				</div>
				<div class="panel-body">
					<?php echo $ActionView;  ?>
				</div>
			</div>
		</div>
	</div>
<?php endforeach;
