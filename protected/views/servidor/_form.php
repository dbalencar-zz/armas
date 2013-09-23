<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'servidor-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'matricula'); ?>
		<?php echo $form->textField($model,'matricula',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'matricula'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cargo'); ?>
		<?php echo $form->textField($model,'cargo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'cargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'classe'); ?>
		<?php echo $form->textField($model,'classe',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'classe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel_res'); ?>
		<?php echo $form->textField($model,'tel_res',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tel_res'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel_cel'); ?>
		<?php echo $form->textField($model,'tel_cel',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tel_cel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel_outro'); ?>
		<?php echo $form->textField($model,'tel_outro',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tel_outro'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->