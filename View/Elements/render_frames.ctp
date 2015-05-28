<?php
/**
 * Render frames element.
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

foreach ($frames as $frame) {
	if (strlen($frame['pluginKey']) === 0) {
		continue;
	}

	if (isset($pluginMap[$frame['pluginKey']]['defaultAction']) && $pluginMap[$frame['pluginKey']]['defaultAction'] !== '') {
		$action = $pluginMap[$frame['pluginKey']]['defaultAction'];
	} else {
		$action = $frame['pluginKey'] . '/index';
	}
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
