<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'api-key-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'api_key',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'app_name',array('class'=>'span5','maxlength'=>250)); ?>

<?php echo $form->textFieldRow($model,'app_link',array('class'=>'span5','maxlength'=>250)); ?>

    <?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'current_monthly_requests',array('class'=>'span5','maxlength'=>20,'readonly'=>true)); ?>

	<?php echo $form->textFieldRow($model,'max_monthly_requests',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created',array('class'=>'span5','readonly'=>true)); ?>

    <?php echo $form->textFieldRow($model,'valid_until',array('class'=>'span5')); ?>

    <?php echo $form->checkboxRow($model,'blocked'); ?>


<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
