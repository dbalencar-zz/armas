<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cautela')); ?>:</b>
	<?php echo CHtml::encode($data->id_cautela); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qtde_carregador')); ?>:</b>
	<?php echo CHtml::encode($data->qtde_carregador); ?>
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