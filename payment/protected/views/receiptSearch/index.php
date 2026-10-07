<?php
/* @var $this ReceiptSearchController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Receipt Searches',
);

$this->menu=array(
	array('label'=>'Create ReceiptSearch', 'url'=>array('create')),
	array('label'=>'Manage ReceiptSearch', 'url'=>array('admin')),
);
?>

<h1>Receipt Searches</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
