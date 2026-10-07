<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
        <!-- Start Bootstrap -->
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.css" />
        <link rel="stylesheet" type="text/css" href="../jquery-ui/jquery-ui.css" />
        <!-- Stop Bootstrap -->
        <!-- Start Jquery -->
        <?php
            Yii::app()->clientScript->registerScriptFile("../jquery.js");     
            Yii::app()->clientScript->registerScriptFile("../jquery-ui/jquery-ui.js");
            Yii::app()->clientScript->registerScriptFile("../bootstrap/js/bootstrap.js"); 
            Yii::app()->clientScript->registerScriptFile("../script_2018.js");
			
            Yii::app()->clientScript->registerCoreScript('../jquery.js');     
            Yii::app()->clientScript->registerCoreScript('../jquery-ui/jquery-ui.js');
        ?>
        <!-- Stop Jquery -->
	<!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div class="container-fluid">
    <div class="nav navbar-inverse row" style=" padding: 15px; color: #ffffff;">
        <div class="pull-left">
        
        <font size="5">
            <i class="glyphicon glyphicon-tasks"></i>
                <?php echo CHtml::encode(Yii::app()->name); ?>
        </font>
          
        </div>
        <?php if(Yii::app()->user->isGuest ){ ?>
        <div class="pull-right"> 
                <a href="index.php?r=site/login" class="btn btn-default" style="width: 100px;">
                    <i class="glyphicon glyphicon-log-in"></i>  Login   
                </a>  
        <?php 
         
         /*
            <form id="formLogin" class="form-inline"> 
                <label> User:</label>
                <input type="text" name="user" class="form-control" style="width: 150px;"/>
                <label> Password </label>
                <input type="password" name="pass" class="form-control" style="width: 150px;"/>                
                <a href="#" class="btn btn-default" onclick="return UserLogin()" style="width: 100px;">
                    <i class="glyphicon glyphicon-log-in"></i>  Login   
                </a>  
            </form> 
                    
         */ }else{ ?> 
            <div class="pull-right" style=" color: #ffffff;"> 
                <font size="3">
                <i class="glyphicon glyphicon-user"></i> <?php echo Yii::app()->user->name;?> </a>  
                </font>
                <a href="index.php?r=site/logout" class="btn btn-default" style="width: 100px;"><i class="glyphicon glyphicon-log-out"></i> Logout </a>
            </div>
        <?php } ?>
        </div>
    </div><!-- header -->
    <div class="nav navbar-default " >
        <ul class="nav navbar-nav">
            <li class="divider-vertical" > 
                <a href="#" onclick="return Home()"><i class="glyphicon glyphicon-home"></i> SSKRU :</a>
            </li>
        </ul>
        
        <?php if(!Yii::app()->user->isGuest and Yii::app()->user->User_status){ ?>
        
        <ul class="nav navbar-nav">
            <li class="divider-vertical" > 
                <a href="#" onclick="return configReceipt(2570)"> <i class="glyphicon glyphicon-list-alt"></i> ออกใบสำคัญรับเงิน </a>
            </li>
        </ul>          
        <ul class="nav navbar-nav">
            <li class="divider-vertical" >                      
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                        <i class="glyphicon glyphicon-cog"></i> รายงานตามรูปแบบใบสำคัญรับเงิน 
                    </a>
                <ul class="dropdown-menu">
                <li ><a href="#" onclick="return repfReceipt(1)"><i class="glyphicon glyphicon-cog" ></i> การรับสมัคร</a></li>
                <li ><a href="#" onclick="return repfReceipt(2)"><i class="glyphicon glyphicon-cog" ></i> การรายงานตัว</a></li>
                <li ><a href="#" onclick="return repfReceipt(20)"><i class="glyphicon glyphicon-cog" ></i> รายงานตัว(ผ่อนผัน)</a></li>
                <li ><a href="#" onclick="return repfReceipt(3)"><i class="glyphicon glyphicon-cog" ></i> การลงทะเบียน</a></li>
                <li ><a href="#" onclick="return repfReceipt(4)"><i class="glyphicon glyphicon-cog" ></i> รายการฝึกประสบการณ์</a></li>
                <li ><a href="#" onclick="return repfReceipt(5)"><i class="glyphicon glyphicon-cog" ></i> รายการหอพักนักศึกษา</a></li>
                <li ><a href="#" onclick="return repfReceipt(6)"><i class="glyphicon glyphicon-cog" ></i> รายการอื่นๆ</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav">
            <li class="divider-vertical" > 
                <a href="#" onclick="return configSearch()"> <i class="glyphicon glyphicon-list-alt"></i> ค้นหาใบสำคัญรับเงิน </a>
            </li>
        </ul>        
        <ul class="nav navbar-nav">
            <li class="divider-vertical" > 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                        <i class="glyphicon glyphicon-cog"></i> ตั้งค่าระบบ 
                    </a>
                <?php if(Yii::app()->user->User_office == 1){ ?>
                <ul class="dropdown-menu">
                    <li ><a href="#" onclick="return configUser()"><i class="glyphicon glyphicon-cog" ></i> จัดการข้อมูลผู้ใช้</a></li>
                    <li><a href="#" onclick="return configOffice()"><i class="glyphicon glyphicon-cog"></i> จัดการข้อมูลหน่วยงาน</a></li>
                    <li class="divider"></li>
                    <li><a href="#" onclick="return configFormat()"><i class="glyphicon glyphicon-cog"></i> จัดการข้อมูลรูปแบบใบสำคัญรับเงิน</a></li>
                    <li><a href="#" onclick="return configList()"><i class="glyphicon glyphicon-cog"></i> จัดการข้อมูลรายการต่างๆ</a></li>
                    <li><a href="#" onclick="return configType()"><i class="glyphicon glyphicon-cog"></i> จัดการข้อมูลประเภทรายการใบสำคัญรับเงิน</a></li>
                    <li class="divider"></li>
                    <li><a href="#" onclick="return FormReceipt()"><i class="glyphicon glyphicon-cog"></i> ยกเลิก..ใบสำคัญรับเงิน</a></li>

                </ul>  
                <?php } ?>
           </li>
        </ul> 
        <?php } ?>
    </div ><!-- mainmenu -->
    <div>
         <?php   echo $content; ?>
         <div id="content" style="padding-top:  10px;"></div>
    </div>
	<div id="footer">
            <font size="2">
            <b>Develop By</b> Mr.Teerapong Songputh <b>E-Mail:</b> Teerapong.s@sskru.ac.th <br/> Copyright &copy; <?php echo date('Y'); ?> Faculty of Liberal Arts and Sciences of Sisaket Rajabhat University.
		All Rights Reserved.<br/>
                </font>
	</div><!-- footer -->
</div>
</body>
</html>
