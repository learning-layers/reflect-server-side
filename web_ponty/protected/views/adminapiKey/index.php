<?php
$this->breadcrumbs=array(
	'Api Keys',
);

$this->menu=array(
	array('label'=>'Create ApiKey','url'=>array('create')),
	array('label'=>'Manage ApiKey','url'=>array('admin')),
);
?>

<h1>Manage Developers</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
