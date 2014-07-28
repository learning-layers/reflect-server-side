<?php
$this->breadcrumbs=array(
	'Api Keys'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ApiKey','url'=>array('index')),
	array('label'=>'Create ApiKey','url'=>array('create')),
	array('label'=>'View ApiKey','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ApiKey','url'=>array('admin')),
);
?>

    <h1><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/manage_dev_48.png', ''); ?> Update Developer #<?php echo $model->id; ?></h1>
    <hr>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>