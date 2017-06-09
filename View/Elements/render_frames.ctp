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

	try {
		$url = $this->PageLayout->frameActionUrl($frame);

CakeLog::debug("\t" . '-- -- -- ' . $url . ' start ' . microtime() . '');
$stime = microtime(true);

		$view = $this->requestAction($url, array('return', 'frame_id' => $frame['id']));
		if (! Current::isSettingMode() && strlen($view) === 0) {
CakeLog::debug("\t" . '-- -- -- ' . $url . '   end ' . microtime() . "\t" . (microtime(true) - $stime) . '');
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
CakeLog::debug("\t" . '-- -- -- ' . $url . '   end ' . microtime() . "\t" . (microtime(true) - $stime) . '');

}
