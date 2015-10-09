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
	if (strlen($frame['plugin_key']) === 0) {
		continue;
	}

	$url = $frame['plugin_key'] . '/' . $this->PageLayout->getDefaultAction($frame['plugin_key']) . '?frame_id=' . $frame['id'];
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
			'view' => $view
		));
	} catch (MissingActionException $ex) {
		CakeLog::error($ex);
	} catch (MissingControllerException $ex) {
		CakeLog::error($ex);
	}
}
