<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<?php if(Yii::app()->getModule('user')->user()) { if(Yii::app()->getModule('user')->user()->profile->orgao === 'PMAM') { ?>
		<div id="img-logo-pc"><img src="<?php echo Yii::app()->baseUrl; ?>/images/pm-logo.png"></img></div>
		<?php } elseif(Yii::app()->getModule('user')->user()->profile->orgao === 'PCAM') { ?>
		<div id="img-logo-pc"><img src="<?php echo Yii::app()->baseUrl; ?>/images/pc-logo.png"></img></div>
		<?php } elseif(Yii::app()->getModule('user')->user()->profile->orgao === 'SSP') { ?>
		<div id="img-logo-pc"><img src="<?php echo Yii::app()->baseUrl; ?>/images/sesp-logo.png"></img></div>
		<?php }} else { ?>
		<div id="img-logo-pc"><img src="<?php echo Yii::app()->baseUrl; ?>/images/sesp-logo.png"></img></div>
		<?php } ?>
		<div id="img-logo-am"><img src="<?php echo Yii::app()->baseUrl; ?>/images/estado-logo.png"></img></div>
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Página Inicial', 'url'=>array('/site/index')),
				array('label'=>'Servidores', 'url'=>array('/servidor'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Tipos de Armamentos', 'url'=>array('/tipo'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Armamentos', 'url'=>array('/arma'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Munição', 'url'=>array('/municao'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Cautelas', 'url'=>array('/cautela'), 'visible'=>!Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
				array('url'=>array('/rights'), 'label'=>'Rights', 'visible'=>Yii::app()->user->isSuperuser),
				array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div id="footer">
		<div id="img-logo-gov"><img src="<?php echo Yii::app()->baseUrl; ?>/images/governo-logo.png"></img></div>
		Copyright &copy; <?php echo date('Y'); ?> by DTEC/SSP/AM.<br/>
		All Rights Reserved (Douglas Alencar).<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>