<?php
$this->breadcrumbs=array(
	'Servidores'=>array('admin'),
	$model->matricula=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Cadastrar', 'url'=>array('create')),
	array('label'=>'Visualizar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Editar Servidor <?php echo $model->matricula; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>