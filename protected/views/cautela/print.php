<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_servidor')); ?>:</b>
	<?php echo CHtml::encode($data->servidor->matricula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_arma')); ?>:</b>
	<?php echo CHtml::encode($data->arma->patrimonio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qtde_municao')); ?>:</b>
	<?php echo CHtml::encode($data->qtde_municao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
	<?php echo CHtml::encode($data->data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />


</div>