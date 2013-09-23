<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'baixa-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row" id="baixaDiv">
		<?php echo $form->labelEx($model,'id_cautela'); ?>
		<?php if($model->isNewRecord)
			echo $form->textField($model,'id_cautela',array('value'=>$id?$id:$model->id_cautela,'id'=>'cautela'));
			else echo $form->textField($model,'id_cautela',array('id'=>'cautela'));
		?>
		<?php echo CHtml::ajaxButton('Verificar',array("/cautela/findById"), array(
					'type'=>'GET',
					'data'=>array('id'=>'js:$("#cautela").val()'),
					'dataType'=>'html',
		    		'beforeSend' => 'function(){$("#baixaDiv").addClass("loading");}',
		    		'complete' => 'function(){$("#baixaDiv").removeClass("loading");}',
					'update'=>'#baixa',
		)); ?>
		<?php echo $form->error($model,'id_cautela'); ?>
	</div>
	
	<div id="baixa" class="simple"></div>

	<div class="row">
		<?php echo $form->labelEx($model,'qtde_carregador'); ?>
		<?php echo $form->textField($model,'qtde_carregador'); ?>
		<?php echo $form->error($model,'qtde_carregador'); ?>
	</div>

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