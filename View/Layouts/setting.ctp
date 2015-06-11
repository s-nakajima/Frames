<?php
/**
 * Frame setting layout
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html lang="<?php echo Configure::read('Config.language') ?>" ng-app="NetCommonsApp">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?php echo (isset($pageTitle) ? h($pageTitle) : ''); ?></title>

		<?php
			echo $this->fetch('meta');

			echo $this->element('NetCommons.common_css');
			echo $this->Html->css('/frames/css/style.css', false);
			echo $this->Html->css('style', array('plugin' => false));
			echo $this->fetch('css');

			echo $this->element('NetCommons.common_js');
			echo $this->fetch('script');
		?>
	</head>

	<body ng-controller="NetCommons.base">
		<?php echo $this->Session->flash(); ?>

		<?php echo $this->element('NetCommons.common_header', array(
				'isPageSetting' => true
			)); ?>

		<main class="<?php echo $this->PageLayout->getContainerFluid(); ?>">
			<?php echo $this->element('Pages.page_header'); ?>

			<div class="row">
				<!-- container-main -->
				<div role="main" id="container-main" class="<?php echo $this->PageLayout->getContainerSize(Container::TYPE_MAIN); ?>"
					 ng-controller="FrameSettingsController" ng-init="initialize({frame: <?php echo h(json_encode(PageLayoutHelper::$frame)) ?>})">

					<section class="frame panel panel-{{frame.headerType}}">
						<div class="panel-heading clearfix">
							<?php echo $this->element('Frames.setting_header', array('frame' => PageLayoutHelper::$frame)); ?>
						</div>
						<div class="panel-body block">
							<?php echo $this->fetch('content'); ?>
						</div>
					</section>
				</div>

				<?php echo $this->element('Pages.page_major'); ?>

				<?php echo $this->element('Pages.page_minor'); ?>
			</div>

			<?php echo $this->element('Pages.page_footer'); ?>
		</main>

		<?php echo $this->element('NetCommons.common_footer'); ?>
	</body>
</html>
