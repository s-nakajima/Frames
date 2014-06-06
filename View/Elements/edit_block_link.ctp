<?php
if ($User = AuthComponent::user()) {
	echo $this->Html->link('<span class="glyphicon glyphicon-cog"></span><span>'.
		__('Block setting').
		'</span>',
		array('plugin' => $frame['Plugin']['folder'],
			'controller' => $frame['Plugin']['folder'],
			'action' => 'block_setting',
			$frame['Frame']['block_id']),
		array('escape' => false,
			//'ng-controller' => 'blockEditController',
			'class' => 'pull-right',
			//'ng-click' => 'show($event)'
		)
	);
}
?>
<div style="clear:both"></div>
