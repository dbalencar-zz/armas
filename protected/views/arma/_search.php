<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'tipoNome'); ?>
		<?php echo $form->textField($model,'tipoNome'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'patrimonio'); ?>
		<?php echo $form->textField($model,'patrimonio',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sinarm'); ?>
		<?php echo $form->textField($model,'sinarm',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_serie'); ?>
		<?php echo $form->textField($model,'num_serie',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nf'); ?>
		<?php echo $form->textField($model,'nf',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'disponivel'); ?>
		<?php echo $form->dropDownList($model,'disponivel',$model->disponivelOptions,array('empty'=>'Todos')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Pesquisar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->