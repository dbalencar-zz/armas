<?php
$this->breadcrumbs=array(
	'Cautelas'=>array('cautela/admin'),
	$id=>array('cautela/view','id'=>$id),
	'Baixa',
);
?>

<h1>Registrar Baixa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'id'=>$id)); ?>