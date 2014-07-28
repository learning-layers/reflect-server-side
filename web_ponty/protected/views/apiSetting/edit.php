<?php
$this->pageTitle = Yii::app()->name . ' - Edit API Settings';
$this->breadcrumbs = array(
    'Edit API Settings',
);
?>

<h1><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/api_settings_48.png', ''); ?> API Settings </h1>


    <br>
    <p>
        Here you can define general settings fot the API. Individual user settings can be made at Manage Developers.
    </p>

    <hr>


<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'edit-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
));
?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'max_requests', array('class' => 'span5', 'maxlength' => 250)); ?>

<?php echo $form->textFieldRow($model, 'valid_for', array('class' => 'span5', 'maxlength' => 250)); ?>


    <p class="help-block"><span class="required">*</span> are required fields.</p>

    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => 'Change Settings',
        ));
        ?>
    </div>

<?php $this->endWidget(); ?>