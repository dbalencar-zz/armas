<?php
$this->breadcrumbs=array(
	'Tipos de Armamentos'=>array('admin'),
	$model->tipoText=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Cadastrar', 'url'=>array('create')),
	array('label'=>'Visualizar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Editar <?php echo $model->tipoText; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>