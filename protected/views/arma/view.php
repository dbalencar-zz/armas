<?php
$this->breadcrumbs=array(
	'Armamentos'=>array('admin'),
	$model->patrimonio,
);

$this->menu=array(
	array('label'=>'Cadastrar', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Excluir', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Confirma a exclusão deste item?')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Visualizar Armamento #<?php echo $model->patrimonio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'patrimonio',
		array('label'=>'Tipo de Armamento','value'=>$model->tipo->tipoText),
		'sinarm',
		'num_serie',
		'nf',
		'data_nf',
		array('label'=>'Disponível','value'=>$model->disponivelText),
	),
)); ?>
