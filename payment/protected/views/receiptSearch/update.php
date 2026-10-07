<?php
/* @var $this ReceiptSearchController */
/* @var $model ReceiptSearch */

$this->breadcrumbs=array(
	'Receipt Searches'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReceiptSearch', 'url'=>array('index')),
	array('label'=>'Create ReceiptSearch', 'url'=>array('create')),
	array('label'=>'View ReceiptSearch', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage ReceiptSearch', 'url'=>array('admin')),
);
?>

<h1>Update ReceiptSearch <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>