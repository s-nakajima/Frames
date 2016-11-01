<?php
/**
 * Render frames element.
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

foreach ($box['Frame'] as $frame) {
	if (strlen($frame['plugin_key']) === 0) {
		continue;
	}

	if ($frame['default_action']) {
		$action = $frame['default_action'];
	} elseif (Hash::get($this->PageLayout->plugins, $frame['plugin_key'] . '.default_action')) {
		$action = Hash::get($this->PageLayout->plugins, $frame['plugin_key'] . '.default_action');
	} else {
		$action = $frame['plugin_key'] . '/index';
	}
	$url = $frame['plugin_key'] . '/' . $action . '?frame_id=' . $frame['id'];

	if (Current::isSettingMode()) {
		$url = Current::SETTING_MODE_WORD . '/' . $url;
	}

	try {
		$view = $this->requestAction($url, array('return'));
		if (! Current::isSettingMode() && strlen($view) === 0) {
			continue;
		}
		echo $this->element('Frames.frame', array(
			'frame' => $frame,
			'view' => $view,
			'containerType' => $containerType,
			'box' => $box,
		));
	} catch (MissingActionException $ex) {
		CakeLog::error($ex);
	} catch (MissingControllerException $ex) {
		CakeLog::error($ex);
	}
}
