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
		<span class="sr-only"><?php echo __('Up frame position'); ?></span>
	</button>

	<button class="btn btn-default" disabled="disabled">
		<span class="glyphicon glyphicon-arrow-down"></span>
		<span class="sr-only"><?php echo __('Down frame position'); ?></span>
	</button>

	<a class="btn btn-default active" href="<?php echo $this->Html->url(isset($current['page']) ? '/' . $current['page']['permalink'] : null); ?>">
		<span class="glyphicon glyphicon-cog"> </span>
		<span class="sr-only"><?php echo __('Show flame setting'); ?></span>
	</a>

	<button class="btn btn-default" disabled="disabled">
		<span class="glyphicon glyphicon-remove"></span>
		<span class="sr-only"><?php echo __('Delete frame'); ?></span>
	</button>
</div>

<?php echo $this->Form->create('Frame',
	array(
		'name' => 'frameForm',
		'novalidate' => true,
		'url' => array('plugin' => 'frames', 'controller' => 'frames', 'action' => 'edit', $frameId),
	)); ?>

	<?php echo $this->Form->hidden('Frame.id', array(
			'value' => $frameId,
		)); ?>

	<?php echo $this->Form->input('Frame.name',
		array(
			'type' => 'text',
			'label' => false,
			'class' => 'form-control frame-name-setting',
			'error' => false,
			'div' => false,
			'value' => $frame['name']
			//'style' => 'display:inline-block;width:auto;',
			//'ng-model' => 'frame.name',
		)); ?>


	<?php echo $this->Form->input('Frame.header_type',
		array(
			'type' => 'text',
			'label' => false,
			'class' => 'hidden',
			'div' => false,
			'value' => $frame['headerType'],
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
		<ul role="menu" class="dropdown-menu">
			<li ng-repeat="headerType in ['default', 'primary', 'info', 'success', 'warning', 'danger']" ng-click="selectHeaderType(headerType)">
				<a href="">
					<div class="panel panel-{{headerType}} frame-header-type-settings">
						<div class="panel-heading text-center">
							<small>{{headerType}}</small>
						</div>
					</div>
				</a>
			</li>
		</ul>
	</div>

	<button type="submit" class="btn btn-default">
		<?php echo __d('net_commons', 'OK'); ?>
	</button>

<?php echo $this->Form->end();

