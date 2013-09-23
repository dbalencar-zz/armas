<?php
$this->breadcrumbs=array(
	'Servidores'=>array('admin'),
	$model->matricula,
);

$this->menu=array(
	array('label'=>'Cadastrar', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Excluir', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Confirma a exclusão deste item?')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Visualizar Servidor <?php echo $model->matricula; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'matricula',
		'nome',
		'cargo',
		'classe',
		'tel_res',
		'tel_cel',
		'tel_outro',
	),
)); ?>
