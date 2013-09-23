<?php
$this->breadcrumbs=array(
	'Tipos de Armamentos'=>array('admin'),
	'Cadastrar',
);

$this->menu=array(
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Cadastrar Tipo de Armamento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>