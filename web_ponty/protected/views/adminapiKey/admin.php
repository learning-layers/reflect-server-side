<?php
$this->breadcrumbs=array(
	'Api Keys'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ApiKey','url'=>array('index')),
	array('label'=>'Create ApiKey','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('api-key-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/manage_dev_48.png', ''); ?> Manage Developers</h1>
<br>
<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<hr>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'api-key-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'api_key',
        'app_name',
        'app_link',
		'current_monthly_requests',
		'max_monthly_requests',
        array('name' => 'blocked', 'value' => '($data->blocked)? "Yes" : "No" '),
        // Maybe show also users email
		'user_id',
        'valid_until',
        'created',
        array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
