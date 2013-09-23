<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'especie'); ?>
		<?php echo $form->textField($model,'especie',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'especie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'marca'); ?>
		<?php echo $form->textField($model,'marca',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'marca'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modelo'); ?>
		<?php echo $form->textField($model,'modelo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'modelo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'calibre'); ?>
		<?php echo $form->textField($model,'calibre',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'calibre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'capacidade'); ?>
		<?php echo $form->textField($model,'capacidade'); ?>
		<?php echo $form->error($model,'capacidade'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'funcionamento'); ?>
		<?php echo $form->textField($model,'funcionamento',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'funcionamento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qtde_canos'); ?>
		<?php echo $form->textField($model,'qtde_canos'); ?>
		<?php echo $form->error($model,'qtde_canos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comp_canos'); ?>
		<?php echo $form->textField($model,'comp_canos'); ?>
		<?php echo $form->error($model,'comp_canos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_alma'); ?>
		<?php echo $form->textField($model,'tipo_alma',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tipo_alma'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'qtde_raias'); ?>
		<?php echo $form->textField($model,'qtde_raias'); ?>
		<?php echo $form->error($model,'qtde_raias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sent_raias'); ?>
		<?php echo $form->textField($model,'sent_raias',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'sent_raias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'acabamento'); ?>
		<?php echo $form->textField($model,'acabamento',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'acabamento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pais'); ?>
		<?php echo $form->textField($model,'pais',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'pais'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'acessorios'); ?>
		<?php echo $form->textArea($model,'acessorios',array('size'=>200,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'acessorios'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->