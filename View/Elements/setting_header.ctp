<?php
/**
 * frame setting header element template.
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Ryo Ozawa <ozawa.ryo@withone.co.jp>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */
?>

<div class="pull-right">
	<a  class="btn btn-default active" href="">
		<span class="glyphicon glyphicon-cog"> </span>
	</a>
</div>

<?php echo $this->Form->create('Frame',
	array(
		'name' => 'frameForm',
		'novalidate' => true,
		'url' => array('plugin' => 'frames', 'controller' => 'frames', 'action' => 'edit', $frameId),
	)); ?>

	<?php echo $this->Form->input('Frame.name',
		array(
			'type' => 'text',
			'label' => false,
			'class' => 'form-control frame-name-setting',
			'error' => false,
			'div' => false,
			//'style' => 'display:inline-block;width:auto;',
			//'ng-model' => 'frame.name',
		)); ?>

	<button type="submit" class="btn btn-default">
		<?php echo __d('net_commons', 'OK'); ?>
	</button>

<?php echo $this->Form->end();

