<?php
if ($User = AuthComponent::user()) {
	echo $this->Html->link(__('Block setting'), array('plugin' => $frame['Plugin']['folder'], 'controller' => $frame['Plugin']['folder'], 'action' => 'block_setting', $frame['Frame']['block_id']), array('ng-controller' => 'blockEditController', 'class' => 'pull-right', 'ng-click' => 'show($event)'));
}
