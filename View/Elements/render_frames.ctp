<?php
/**
 * Render frames element.
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */
echo $this->Html->script('/frames/js/frames.js', false);

foreach ($frames as $frame) {
	if (strlen($frame['pluginKey']) === 0) {
		continue;
	}

	$action = $pluginMap[$frame['pluginKey']]['defaultAction'] ? : $frame['pluginKey'] . '/index';
	$url = $frame['pluginKey'] . '/' . $action . '/' . $frame['id'];
	if (Page::isSetting()) {
		$url = Page::SETTING_MODE_WORD . '/' . $url;
	}

	$view = $this->requestAction($url, array('return'));
	if (! Page::isSetting() && strlen($view) === 0) {
		continue;
	}

	echo $this->element('Frames.frame', array(
			'frame' => $frame,
			'view' => $view
		));
}
