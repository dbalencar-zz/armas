<?php
$this->breadcrumbs=array(
	'Tipos de Armamentos'=>array('admin'),
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
	$.fn.yiiGridView.update('tipo-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciar Tipos de Armamentos</h1>

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
	'id'=>'tipo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'especie',
		'marca',
		'modelo',
		'calibre',
		'capacidade',
		/*
		'funcionamento',
		'qtde_canos',
		'comp_canos',
		'tipo_alma',
		'qtde_raias',
		'sent_raias',
		'acabamento',
		'pais',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
