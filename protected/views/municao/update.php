<?php
$this->breadcrumbs=array(
	'Municão'=>array('admin'),
	$model->lote=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Cadastrar', 'url'=>array('create')),
	array('label'=>'Visualizar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Editar Lote <?php echo $model->lote; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'tipos'=>$tipos)); ?>