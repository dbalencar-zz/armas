<?php
$this->breadcrumbs=array(
	'Cautelas'=>array('admin'),
	'Registrar',
);

$this->menu=array(
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Registrar Cautela</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>