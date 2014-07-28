<?php

$this->pageTitle = Yii::app()->name . ' - Request API key';
$this->breadcrumbs = array(
    'Request API Key',
);
?>


    <h1><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/developer_48.png', ''); ?> Request API Key</h1>

    <p>Please fill out the following form to get access to the API. The Pontydysgu team will decide as soon as possible about your request.</p>

    <hr>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'requestKey-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
));
?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 250, 'readonly'=>'true')); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 250)); ?>

<?php echo $form->textFieldRow($model, 'app_name', array('class' => 'span5', 'maxlength' => 250)); ?>

<?php echo $form->textFieldRow($model, 'app_link', array('class' => 'span5', 'maxlength' => 250)); ?>

<?php echo $form->textAreaRow($model, 'contact_message', array('class' => 'span5', 'rows' => 5)); ?>

    <p class="help-block"><span class="required">*</span> are required fields.</p>

    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => 'Send Request',
        ));
        ?>
    </div>

<?php $this->endWidget(); ?>