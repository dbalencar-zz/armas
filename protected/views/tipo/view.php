<?php
$this->breadcrumbs=array(
	'Tipos de Armamento'=>array('admin'),
	$model->tipoText,
);

$this->menu=array(
	array('label'=>'Cadastrar', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Excluir', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Visualizar <?php echo $model->tipoText; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'especie',
		'marca',
		'modelo',
		'calibre',
		'capacidade',
		'funcionamento',
		'qtde_canos',
		'comp_canos',
		'tipo_alma',
		'qtde_raias',
		'sent_raias',
		'acabamento',
		'pais',
		'acessorios',
	),
)); ?>
