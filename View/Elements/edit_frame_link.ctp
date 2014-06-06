<?php
if ($User = AuthComponent::user()) {
	?><span class="pull-right"><?php
	echo $this->Html->link('<span class="glyphicon glyphicon-cog"></span><span style="display:none">'.
		__('flame setting').
		'</span>',
		'javascript:void(0)',//link
		array('escape' => false,
			'class' => 'btn btn-default'
		)
	);
	echo $this->Html->link('<span class="glyphicon glyphicon-remove"></span><span style="display:none">'.
		__('remove').
		'</span>',
		'javascript:void(0)',//link
		array('escape' => false,
			'class' => 'btn btn-default'
		)
	);
	?></span><?php
}
?>
<div style="clear:both"></div>