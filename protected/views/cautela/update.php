<?php
$this->breadcrumbs=array(
	'Cautelas'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Registrar', 'url'=>array('create')),
	array('label'=>'Visualizar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Editar Cautela <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>