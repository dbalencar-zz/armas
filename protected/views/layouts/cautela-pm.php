<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/cautela.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body onload="window.print()">

<div class="container" id="page">

	<div id="header">
		<div id="logo"><img src="<?php echo Yii::app()->baseUrl; ?>/images/estado-logo.png"></img></div>
		<div id="logo1">GOVERNO DO ESTADO DO AMAZONAS</div>
	</div><!-- header -->

	<?php echo $content; ?>

	<div id="footer">
		<div id="img-logo-gov"><img src="<?php echo Yii::app()->baseUrl; ?>/images/governo-logo.png"></img></div>
		<p class="footer-left">R. 07, Nº.12, Cj. Celetramazon, Adrianópolis<br/>Fone: (92) 3214-5526/3214-5528 (Fax)<br/>Manaus - AM - CEP 69057-320</p>
		<div id="img-logo-pc"><img src="<?php echo Yii::app()->baseUrl; ?>/images/pm-logo.png"></img></div>
		<p class="footer-center"><b>PMAM<br/>Polícia Militar do Estado do Amazonas</b><br/>2ª.Seção do Estado-Maior Geral</p>
	</div><!-- footer -->
	
	<hr style="border-top: 3px dotted #000000; margin-top: 5px;" />
	
	<div id="header">
		<div id="logo"><img src="<?php echo Yii::app()->baseUrl; ?>/images/estado-logo.png"></img></div>
		<div id="logo1">GOVERNO DO ESTADO DO AMAZONAS</div>
	</div><!-- header -->

	<?php echo $content; ?>

	<div id="footer">
		<div id="img-logo-gov"><img src="<?php echo Yii::app()->baseUrl; ?>/images/governo-logo.png"></img></div>
		<p class="footer-left">R. 07, Nº.12, Cj. Celetramazon, Adrianópolis<br/>Fone: (92) 3214-5526/3214-5528 (Fax)<br/>Manaus - AM - CEP 69057-320</p>
		<div id="img-logo-pc"><img src="<?php echo Yii::app()->baseUrl; ?>/images/pm-logo.png"></img></div>
		<p class="footer-center"><b>PMAM<br/>Polícia Militar do Estado do Amazonas</b><br/>2ª.Seção do Estado-Maior Geral</p>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>