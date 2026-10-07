<?php
/* @var $this ReceiptSearchController */
/* @var $model ReceiptSearch */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'receipt-search-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CITIZEN_ID'); ?>
		<?php echo $form->textField($model,'CITIZEN_ID',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'CITIZEN_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STU_ID'); ?>
		<?php echo $form->textField($model,'STU_ID',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'STU_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STUName'); ?>
		<?php echo $form->textField($model,'STUName',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'STUName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PRICE'); ?>
		<?php echo $form->textField($model,'PRICE'); ?>
		<?php echo $form->error($model,'PRICE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STU_TYPE'); ?>
		<?php echo $form->textField($model,'STU_TYPE'); ?>
		<?php echo $form->error($model,'STU_TYPE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Receipt_ID'); ?>
		<?php echo $form->textField($model,'Receipt_ID',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'Receipt_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Format_ID'); ?>
		<?php echo $form->textField($model,'Format_ID'); ?>
		<?php echo $form->error($model,'Format_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PRICE_SUM'); ?>
		<?php echo $form->textField($model,'PRICE_SUM'); ?>
		<?php echo $form->error($model,'PRICE_SUM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'User_ID'); ?>
		<?php echo $form->textField($model,'User_ID'); ?>
		<?php echo $form->error($model,'User_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ChackDate'); ?>
		<?php echo $form->textField($model,'ChackDate',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'ChackDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->