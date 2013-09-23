<?php
$this->breadcrumbs=array(
	'Servidores'=>array('admin'),
	'Cadastrar',
);

$this->menu=array(
	array('label'=>'Gerenciar', 'url'=>array('admin')),
);
?>

<h1>Cadastrar Servidor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>