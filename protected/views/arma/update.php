<?php
$this->breadcrumbs=array(
	'Armamentos'=>array('admin'),
	$model->patrimonio=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Cadastrar', 'url'=>array('create')),
	array('label'=>'Visualizar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Editar armamento <?php echo $model->patrimonio; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'tipos'=>$tipos)); ?>