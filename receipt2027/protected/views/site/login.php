<?php
/*
    $POST=" 1339900522503 ";
    $countID=strlen(trim($POST));
    $ip = "202.29.57.8"; 
    $host = gethostbyaddr($ip); 
   // print "Host name for $ip is $host And $countID <BR>";
    
        $host="regis.sskru.ac.th:80"; 
        //$host="regis.sskru.ac.th";
    $ip = gethostbynamel($host); 
    for ($i=0; $i<count($ip); $i++) 
    { 
     //   print $ip[$i]."<BR>"; 
    } 
  */   
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-off"></i>
        Login
    </div>
</div>
<div class="panel-body">
<?php // if($host==""){ ?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php  //} ?>
</div>
