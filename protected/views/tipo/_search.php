<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'especie'); ?>
		<?php echo $form->textField($model,'especie',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'marca'); ?>
		<?php echo $form->textField($model,'marca',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modelo'); ?>
		<?php echo $form->textField($model,'modelo',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'calibre'); ?>
		<?php echo $form->textField($model,'calibre',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'capacidade'); ?>
		<?php echo $form->textField($model,'capacidade'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'funcionamento'); ?>
		<?php echo $form->textField($model,'funcionamento',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qtde_canos'); ?>
		<?php echo $form->textField($model,'qtde_canos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comp_canos'); ?>
		<?php echo $form->textField($model,'comp_canos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_alma'); ?>
		<?php echo $form->textField($model,'tipo_alma',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qtde_raias'); ?>
		<?php echo $form->textField($model,'qtde_raias'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sent_raias'); ?>
		<?php echo $form->textField($model,'sent_raias',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'acabamento'); ?>
		<?php echo $form->textField($model,'acabamento',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pais'); ?>
		<?php echo $form->textField($model,'pais',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Pesquisar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->