<?php
/* @var $this ReceiptSearchController */
/* @var $model ReceiptSearch */

$this->breadcrumbs=array(
	'Receipt Searches'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ReceiptSearch', 'url'=>array('index')),
	array('label'=>'Create ReceiptSearch', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#receipt-search-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'receipt-search-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'CITIZEN_ID',
		'STUName',
		'Receipt_ID',
		'ChackDate',
		
	),
)); ?>
