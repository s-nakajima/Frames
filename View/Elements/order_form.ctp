<?php
/**
 * Element of frame delete
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
?>

<?php echo $this->Form->create('', array(
		'type' => 'post',
		'class' => 'frame-btn pull-left',
		'url' => '/frames/frames/order/' . $frame['id']
	)); ?>

	<?php echo $this->Form->hidden('Frame.id', array(
			'value' => $frame['id'],
		)); ?>

	<?php echo $this->Form->hidden('Frame.box_id', array(
			'value' => $frame['box_id'],
		)); ?>

	<?php echo $this->Form->button('<span class="glyphicon glyphicon-arrow-up"></span><span class="sr-only">' . __d('frames', 'Up frame position') . '</span>', array(
			'name' => 'up',
			'class' => 'btn btn-default frame-btn pull-left',
		)); ?>

	<?php echo $this->Form->button('<span class="glyphicon glyphicon-arrow-down"></span><span class="sr-only">' . __d('frames', 'Down frame position') . '</span>', array(
			'name' => 'down',
			'class' => 'btn btn-default frame-btn pull-left',
		)); ?>
<?php echo $this->Form->end();