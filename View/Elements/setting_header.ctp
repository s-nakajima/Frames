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
	<button class="btn btn-default" disabled="disabled">
		<span class="glyphicon glyphicon-arrow-up"></span>
		<span class="sr-only"><?php echo __d('frames', 'Up frame position'); ?></span>
	</button>

	<button class="btn btn-default" disabled="disabled">
		<span class="glyphicon glyphicon-arrow-down"></span>
		<span class="sr-only"><?php echo __d('frames', 'Down frame position'); ?></span>
	</button>

	<a class="btn btn-default active" title="<?php echo __d('net_commons', 'Quit'); ?>"
	   href="<?php echo $this->Html->url('/' . Current::SETTING_MODE_WORD . '/' . h(Current::read('Page.permalink'))); ?>">
		<span class="glyphicon glyphicon-cog"> </span>
		<span class="sr-only"><?php echo __d('frames', 'Show flame setting'); ?></span>
	</a>

	<button class="btn btn-default" disabled="disabled">
		<span class="glyphicon glyphicon-remove"></span>
		<span class="sr-only"><?php echo __d('frames', 'Delete frame'); ?></span>
	</button>
</div>

<?php echo $this->NetCommonsForm->create('Frame',
	array(
		'name' => 'frameForm',
		'novalidate' => true,
		'action' => 'post',
		'url' => NetCommonsUrl::actionUrl(array('plugin' => 'frames', 'controller' => 'frames', 'action' => 'edit')),
	)); ?>

	<?php echo $this->NetCommonsForm->hidden('Frame.id', array(
			'value' => Current::read('Frame.id'),
		)); ?>

	<?php echo $this->Form->input('Frame.name',
		array(
			'type' => 'text',
			'label' => false,
			'class' => 'form-control frame-name-setting',
			'error' => false,
			'div' => false,
			'value' => $frame['name']
		)); ?>

	<?php echo $this->Form->input('Frame.header_type',
		array(
			'type' => 'text',
			'label' => false,
			'class' => 'hidden',
			'div' => false,
			'value' => $frame['header_type'],
		)); ?>

	<div class="btn-group">
		<button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle frame-header-type-btn">
			<div class="panel panel-{{frame.headerType}} frame-header-type-settings">
				<div class="panel-heading">
					<small>{{frame.headerType}}</small>
				</div>
			</div>
			<span class="caret"></span>
		</button>
		<?php
			$headerTypes = array(
				['key' => 'default', 'name' => __d('frames', 'default')],
				['key' => 'primary', 'name' => __d('frames', 'primary')],
				['key' => 'info', 'name' => __d('frames', 'info')],
				['key' => 'success', 'name' => __d('frames', 'success')],
				['key' => 'warning', 'name' => __d('frames', 'warning')],
				['key' => 'danger', 'name' => __d('frames', 'danger')],
			);
		?>
		<ul role="menu" class="dropdown-menu" ng-init="headerTypes = <?php echo h(json_encode($headerTypes)); ?>">
			<li ng-repeat="headerType in headerTypes" ng-click="selectHeaderType(headerType.key)">
				<a href="">
					<div class="panel panel-{{headerType.key}} frame-header-type-settings">
						<div class="panel-heading text-center">
							<small>{{headerType.name}}</small>
						</div>
					</div>
				</a>
			</li>
		</ul>
	</div>

	<button type="submit" class="btn btn-default" ng-click="sending=true" ng-disabled="sending" onclick="submit()">
		<?php echo __d('net_commons', 'OK'); ?>
	</button>
<?php echo $this->NetCommonsForm->end();
