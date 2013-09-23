<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    
    <title>Cautelas Vigentes</title>
</head>
<body>
<center>
<h1>Cautelas Vigentes</h1>
<form method="post">
<h2><?php if(Yii::app()->getModule('user')->user()->profile->orgao==='SSP') echo CHtml::dropDownList('orgao', $orgao, cautela::model()->getOrgaoOptions(), array(
	'submit'=>array('cautela/RelCautelasVigentes'),
)); ?></h2>
</form>
<table width="95%">
  <tr>
  	<th>Item</th>
  	<th>Cautela</th>
  	<th>Data</th>
  	<th>Matrícula</th>
  	<th>Servidor</th>
  	<th>Arma</th>
  	<th>Marca</th>
  	<th>Modelo</th>
  	<th>Calibre</th>
  	<th>Série</th>
  	<th>Patrimônio</th>
  </tr>
<?php foreach ($models as $n=>$model) { ?>
  <tr>
  	<td><?php echo $n+1; ?></td>
  	<td><?php echo $model->id; ?></td>
  	<td><?php echo $model->data; ?></td>
  	<td><?php echo $model->servidor->matricula; ?></td>
  	<td><?php echo $model->servidor->nome; ?></td>
  	<td><?php echo $model->arma->tipo->especie; ?></td>
  	<td><?php echo $model->arma->tipo->marca; ?></td>
  	<td><?php echo $model->arma->tipo->modelo; ?></td>
  	<td><?php echo $model->arma->tipo->calibre; ?></td>
  	<td><?php echo $model->arma->num_serie; ?></td>
  	<td><?php echo $model->arma->patrimonio; ?></td>
  </tr>
<?php } ?>
</table>
</center>
</body>
</html>
