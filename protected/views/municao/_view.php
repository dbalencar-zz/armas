<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('lote')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->lote), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo->tipoText); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nf')); ?>:</b>
	<?php echo CHtml::encode($data->nf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_nf')); ?>:</b>
	<?php echo CHtml::encode($data->data_nf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantidade')); ?>:</b>
	<?php echo CHtml::encode($data->quantidade); ?>
	<br />

</div>