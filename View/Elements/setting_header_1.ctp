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
<!-- frame setting START -->

<div class="pull-right">
	<a  class="btn btn-default active" href="#">
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
			'class' => 'form-control',
			'error' => false,
			'div' => false,
			'style' => 'display:inline-block;width:auto;',
			'ng-model' => 'frame.name',
		)); ?>

	<?php echo $this->Form->input('Frame.header_type',
		array(
			'type' => 'text',
			'label' => false,
			'class' => 'hidden',
			'div' => false,
			'ng-value' => 'frame.headerType',
		)); ?>

	<div id="display_type" class="btn-group">
		<button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
			<div class="panel panel-{{frame.headerType}}"
				 style="display:inline-block;width:120px;margin-bottom:0;margin-right:auto;margin-left:auto;">
				<div class="panel-heading" style="padding:0px">
					<span class="panel-title" ng-bind="frame.headerType"></span>
				</div>
			</div>
			<span class="caret"></span>
		</button>
		<ul role="menu" class="dropdown-menu nc-counter-display-type">
			<li ng-repeat="labelType in labelTypes"
				ng-click="selectLabel(labelType)">
				<a href="#">
					<div class="panel panel-{{labelType}}"
						 style="width:120px;margin-bottom:0;margin-right:auto;margin-left:auto;">
						<div class="panel-heading text-center" style="padding:0px">
							<span class="panel-title" ng-bind="labelType"></span>
						</div>
					</div>
				</a>
			</li>
		</ul>
	</div>

	<button type="submit" class="btn btn-default">
		<?php echo __d('net_commons', 'OK'); ?>
	</button>

<!-- frame setting END -->
<?php echo $this->Form->end();

