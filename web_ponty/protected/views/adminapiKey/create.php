<?php
$this->breadcrumbs=array(
	'Api Keys'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ApiKey','url'=>array('index')),
	array('label'=>'Manage ApiKey','url'=>array('admin')),
);
?>

    <h1><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/manage_dev_48.png', ''); ?> Create Developer </h1>
    <hr>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>