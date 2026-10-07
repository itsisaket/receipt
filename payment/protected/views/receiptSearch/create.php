<?php
/* @var $this ReceiptSearchController */
/* @var $model ReceiptSearch */

$this->breadcrumbs=array(
	'Receipt Searches'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReceiptSearch', 'url'=>array('index')),
	array('label'=>'Manage ReceiptSearch', 'url'=>array('admin')),
);
?>

<h1>Create ReceiptSearch</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>