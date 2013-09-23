<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('matricula')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->matricula), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cargo')); ?>:</b>
	<?php echo CHtml::encode($data->cargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('classe')); ?>:</b>
	<?php echo CHtml::encode($data->classe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tel_res')); ?>:</b>
	<?php echo CHtml::encode($data->tel_res); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tel_cel')); ?>:</b>
	<?php echo CHtml::encode($data->tel_cel); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tel_outro')); ?>:</b>
	<?php echo CHtml::encode($data->tel_outro); ?>
	<br />

	*/ ?>

</div>