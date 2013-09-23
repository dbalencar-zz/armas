<?php
$this->breadcrumbs=array(
	'Cautelas'=>array('cautela/admin'),
	$model->cautela->id=>array('cautela/view','id'=>$model->cautela->id),
	'Baixa',
);
?>

<h1>Visualizar Baixa</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_cautela',
		'qtde_carregador',
		'qtde_municao',
		'data',
		'estado',
	),
)); ?>
