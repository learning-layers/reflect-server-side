<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('api_key')); ?>:</b>
	<?php echo CHtml::encode($data->api_key); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('app_name')); ?>:</b>
    <?php echo CHtml::encode($data->app_name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('app_link')); ?>:</b>
    <?php echo CHtml::encode($data->app_link); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('blocked')); ?>:</b>
	<?php echo CHtml::encode($data->blocked); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valid_until')); ?>:</b>
	<?php echo CHtml::encode($data->valid_until); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_monthly_requests')); ?>:</b>
	<?php echo CHtml::encode($data->current_monthly_requests); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_monthly_requests')); ?>:</b>
	<?php echo CHtml::encode($data->max_monthly_requests); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	*/ ?>

</div>