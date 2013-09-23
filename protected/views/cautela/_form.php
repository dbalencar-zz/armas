<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cautela-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row" id="servDiv">
		<?php echo $form->labelEx($model,'id_servidor'); ?>
		<?php echo $form->textField($model,'id_servidor',array('id'=>'matricula')); ?>
		<?php echo CHtml::ajaxButton('Verificar',array("/servidor/findByMat"), array(
			'type'=>'GET',
			'data'=>array('id'=>'js:$("#matricula").val()'),
			'dataType'=>'html',
    		'beforeSend' => 'function(){$("#servDiv").addClass("loading");}',
    		'complete' => 'function(){$("#servDiv").removeClass("loading");}',
			'update'=>'#servidor',
		)); ?>
		<?php echo $form->error($model,'id_servidor'); ?>
	</div>
	
	<div id="servidor" class="simple"></div>

	<div class="row" id="armaDiv">
		<?php echo $form->labelEx($model,'id_arma'); ?>
		<?php echo $form->textField($model,'id_arma',array('id'=>'patrimonio')); ?>
		<?php echo CHtml::ajaxButton('Verificar',array("/arma/findByPat"), array(
			'type'=>'GET',
			'data'=>array('id'=>'js:$("#patrimonio").val()'),
			'dataType'=>'html',
    		'beforeSend' => 'function(){$("#armaDiv").addClass("loading");}',
    		'complete' => 'function(){$("#armaDiv").removeClass("loading");}',
			'update'=>'#arma',
		)); ?>
		<?php echo $form->error($model,'id_arma'); ?>
	</div>

	<div id="arma" class="simple"></div>
	
	<div class="row" id="municaoDiv">
		<?php echo $form->labelEx($model,'id_municao'); ?>
		<?php echo $form->textField($model,'id_municao',array('id'=>'lote')); ?>
		<?php echo CHtml::ajaxButton('Verificar',array("/municao/findByLote"), array(
			'type'=>'GET',
			'data'=>array('id'=>'js:$("#lote").val()'),
			'dataType'=>'html',
    		'beforeSend' => 'function(){$("#municaoDiv").addClass("loading");}',
    		'complete' => 'function(){$("#municaoDiv").removeClass("loading");}',
			'update'=>'#municao',
		)); ?>
		<?php echo $form->error($model,'id_municao'); ?>
	</div>

	<div id="municao" class="simple"></div>

	<div class="row">
		<?php echo $form->labelEx($model,'qtde_municao'); ?>
		<?php echo $form->textField($model,'qtde_municao'); ?>
		<?php echo $form->error($model,'qtde_municao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data'); ?>
		<?php echo $form->textField($model,'data',array("id"=>"data")); ?>
		<?php $this->widget('application.extensions.calendar.SCalendar', array(
			'inputField'=>'data',
		    'ifFormat'=>'%Y-%m-%d',
		)); ?>
		<?php echo $form->error($model,'data'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->