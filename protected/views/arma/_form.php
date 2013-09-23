<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'arma-form',
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
		<?php echo $form->labelEx($model,'patrimonio'); ?>
		<?php echo $form->textField($model,'patrimonio',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'patrimonio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sinarm'); ?>
		<?php echo $form->textField($model,'sinarm',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'sinarm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_serie'); ?>
		<?php echo $form->textField($model,'num_serie',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'num_serie'); ?>
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

	<?php if(!$model->isNewRecord) { ?>
	<div class="row">
		<?php echo $form->labelEx($model,'disponivel'); ?>
		<?php echo $form->dropDownList($model,'disponivel',$model->disponivelOptions); ?>
		<?php echo $form->error($model,'disponivel'); ?>
	</div>
	<?php } ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->