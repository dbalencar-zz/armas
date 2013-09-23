<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('patrimonio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->patrimonio), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo->tipoText); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sinarm')); ?>:</b>
	<?php echo CHtml::encode($data->sinarm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_serie')); ?>:</b>
	<?php echo CHtml::encode($data->num_serie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nf')); ?>:</b>
	<?php echo CHtml::encode($data->nf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_nf')); ?>:</b>
	<?php echo CHtml::encode($data->data_nf); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('disponivel')); ?>:</b>
	<?php echo CHtml::encode($data->disponivel); ?>
	<br />

	*/ ?>

</div>