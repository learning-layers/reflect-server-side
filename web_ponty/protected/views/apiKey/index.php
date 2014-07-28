<?php
$this->breadcrumbs = array(
    'Developer',
);
?>

<h1><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/developer_48.png', ''); ?> API access

    <div class="pull-right">
        <?php echo CHtml::link('<button class="btn btn-large" type="button">' . CHtml::image(Yii::app()->request->baseUrl . '/images/password_32.png') . ' &nbsp;&nbsp; Request API Key</button>', array('apiKey/requestKey')) ?></div> </h1>
<hr>
<br>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(
        'api_key',
        'app_name',
        'app_link',
        'current_monthly_requests',
        'max_monthly_requests',
        'valid_until',
        'created',
        'blocked:boolean',
    ),
)); ?>