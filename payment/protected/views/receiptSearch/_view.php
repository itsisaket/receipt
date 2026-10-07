<?php
/* @var $this ReceiptSearchController */
/* @var $data ReceiptSearch */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CITIZEN_ID')); ?>:</b>
	<?php echo CHtml::encode($data->CITIZEN_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STU_ID')); ?>:</b>
	<?php echo CHtml::encode($data->STU_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STUName')); ?>:</b>
	<?php echo CHtml::encode($data->STUName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRICE')); ?>:</b>
	<?php echo CHtml::encode($data->PRICE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STU_TYPE')); ?>:</b>
	<?php echo CHtml::encode($data->STU_TYPE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Receipt_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Receipt_ID); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Format_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Format_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRICE_SUM')); ?>:</b>
	<?php echo CHtml::encode($data->PRICE_SUM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('User_ID')); ?>:</b>
	<?php echo CHtml::encode($data->User_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ChackDate')); ?>:</b>
	<?php echo CHtml::encode($data->ChackDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	*/ ?>

</div>