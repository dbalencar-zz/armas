<?php
$this->breadcrumbs=array(
	'Municão'=>array('admin'),
	'Cadastrar',
);

$this->menu=array(
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Cadastrar Munição</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'tipos'=>$tipos)); ?>