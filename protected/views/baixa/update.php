<?php
$this->breadcrumbs=array(
	'Baixas'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Cadastrar', 'url'=>array('create')),
	array('label'=>'Visualizar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Update baixa <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>