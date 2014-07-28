<?php
$this->breadcrumbs=array(
    'Api Keys'=>array('index'),
    $model->id,
);

$this->menu=array(
    array('label'=>'List ApiKey','url'=>array('index')),
    array('label'=>'Create ApiKey','url'=>array('create')),
    array('label'=>'Update ApiKey','url'=>array('update','id'=>$model->id)),
    array('label'=>'Delete ApiKey','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage ApiKey','url'=>array('admin')),
);
?>

<h1><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/manage_dev_48.png', ''); ?> View Developer #<?php echo $model->id; ?></h1>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(
        'id',
        'api_key',
        'app_name',
        'app_link',
        'current_monthly_requests',
        'max_monthly_requests',
        'valid_until',
        'created',
        'blocked',
        'user_id',
    ),
)); ?>
