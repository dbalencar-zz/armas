<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'municao-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_tipo'); ?>
		<?php echo CHtml::activeDropDownList($model, 'id_tipo', $tipos, array(
			'empty'=>'-- selecione --',
		)); ?>
		<?php echo $form->error($model,'id_tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lote'); ?>
		<?php echo $form->textField($model,'lote',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'lote'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nf'); ?>
		<?php echo $form->textField($model,'nf',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nf'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data_nf'); ?>
		<?php echo $form->textField($model,'data_nf',array("id"=>"data_nf")); ?>
		<?php $this->widget('application.extensions.calendar.SCalendar', array(
			'inputField'=>'data_nf',
		    'ifFormat'=>'%Y-%m-%d',
		)); ?>
		<?php echo $form->error($model,'data_nf'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quantidade'); ?>
		<?php echo $form->textField($model,'quantidade'); ?>
		<?php echo $form->error($model,'quantidade'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->