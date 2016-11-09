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

<?php echo $this->NetCommonsForm->create('Frame', array(
		'type' => 'delete',
		'class' => 'frame-btn pull-left',
		'url' => NetCommonsUrl::actionUrl(array('plugin' => 'frames', 'controller' => 'frames', 'action' => 'delete'))
	)); ?>

	<?php echo $this->NetCommonsForm->hidden('Frame.id', array(
			'value' => $frame['id'],
		)); ?>

	<?php echo $this->PageLayout->frameDeleteButton(); ?>
<?php echo $this->NetCommonsForm->end();
