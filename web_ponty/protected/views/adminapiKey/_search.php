<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<br>
<br>
<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'api_key',array('class'=>'span5','maxlength'=>255)); ?>

<?php echo $form->textFieldRow($model,'app_name',array('class'=>'span5','maxlength'=>250)); ?>

<?php echo $form->textFieldRow($model,'app_link',array('class'=>'span5','maxlength'=>250)); ?>

<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5')); ?>

<?php echo $form->textFieldRow($model,'max_monthly_requests',array('class'=>'span5')); ?>

<?php echo $form->textFieldRow($model,'valid_until',array('class'=>'span5')); ?>

<?php echo $form->checkboxRow($model,'blocked'); ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
