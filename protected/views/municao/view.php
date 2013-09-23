<?php
$this->breadcrumbs=array(
	'Municão'=>array('admin'),
	$model->lote,
);

$this->menu=array(
	array('label'=>'Cadastrar', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Excluir', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Confirma a exclusão deste item?')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Visualizar Lote #<?php echo $model->lote; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'lote',
		array('label'=>'Tipo de Armamento','value'=>$model->tipo->tipoText),
		'nf',
		'data_nf',
		'quantidade',
	),
)); ?>
