<?php
$this->breadcrumbs=array(
	'Municão'=>array('admin'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'Cadastrar', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('municao-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciar Munição</h1>

<p>
Você pode opcionalmente utilizar um operador de comparação (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
ou <b>=</b>) no início de cada um de seus valores de pesquisa para especificar como a comparação deve ser feita.
</p>

<?php echo CHtml::link('Busca Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'municao-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'tipoNome',
		'lote',
		'nf',
		'quantidade',
		/*
		'data_nf',
		'orgao',
		'usuario',
		'time',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
