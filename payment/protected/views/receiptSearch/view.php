<?php
/* @var $this ReceiptSearchController */
/* @var $model ReceiptSearch */

$this->breadcrumbs=array(
	'Receipt Searches'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'List ReceiptSearch', 'url'=>array('index')),
	array('label'=>'Create ReceiptSearch', 'url'=>array('create')),
	array('label'=>'Update ReceiptSearch', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete ReceiptSearch', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReceiptSearch', 'url'=>array('admin')),
);
?>

<h1>View ReceiptSearch #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'CITIZEN_ID',
		'STU_ID',
		'STUName',
		'PRICE',
		'STU_TYPE',
		'Receipt_ID',
		'Format_ID',
		'PRICE_SUM',
		'User_ID',
		'ChackDate',
		'STATUS',
	),
)); ?>
