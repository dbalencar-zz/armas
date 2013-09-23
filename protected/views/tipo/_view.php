<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('especie')); ?>:</b>
	<?php echo CHtml::encode($data->especie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marca')); ?>:</b>
	<?php echo CHtml::encode($data->marca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modelo')); ?>:</b>
	<?php echo CHtml::encode($data->modelo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calibre')); ?>:</b>
	<?php echo CHtml::encode($data->calibre); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('capacidade')); ?>:</b>
	<?php echo CHtml::encode($data->capacidade); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('funcionamento')); ?>:</b>
	<?php echo CHtml::encode($data->funcionamento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qtde_canos')); ?>:</b>
	<?php echo CHtml::encode($data->qtde_canos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comp_canos')); ?>:</b>
	<?php echo CHtml::encode($data->comp_canos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_alma')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_alma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qtde_raias')); ?>:</b>
	<?php echo CHtml::encode($data->qtde_raias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sent_raias')); ?>:</b>
	<?php echo CHtml::encode($data->sent_raias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acabamento')); ?>:</b>
	<?php echo CHtml::encode($data->acabamento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pais')); ?>:</b>
	<?php echo CHtml::encode($data->pais); ?>
	<br />

	*/ ?>

</div>