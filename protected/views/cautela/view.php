<?php
$this->breadcrumbs=array(
	'Cautelas'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Registrar', 'url'=>array('create')),
	array('label'=>'Baixar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('baixar', 'id'=>$model->id),'confirm'=>'Confirma a Baixa desta Cautela?'), 'visible'=>$model->baixa===null),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Excluir', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Confirma a exclusão deste item?')),
	array('label'=>'Gerenciar', 'url'=>array('admin')),
	array('label'=>'Imprimir', 'url'=>array('imprimir', 'id'=>$model->id), 'linkOptions'=>array('target'=>'_blank')),
);
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cautela-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model); ?>

<?php $this->endWidget(); ?>
</div>

<h1>Visualizar Cautela nº. <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'servidor.matricula',
		'arma.patrimonio',
		'municao.lote',
		'qtde_municao',
		'data',
		'estado',
	),
)); ?>

<?php if($model->baixa!==null) { ?>
	
	<br/>
	<h2>Baixa</h2>
	
	<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->baixa,
	'attributes'=>array(
		'qtde_municao',
		'data',
		'estado',
	),
));
} ?>
