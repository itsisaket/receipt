<div class="row" >
    <p><center><h3><?php echo "Date: ".Date('d-m-Y H:i:s')."";?></h3></center></p>
<div class="col-sm-6"> 
<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
        <b> ใบสำคัญรับเงิน สำหรับรับสมัคร </b>
    </div>
    <div class="panel-body">
        
        <table class="table" >
            <tbody>
                <?php foreach ($Formats as $Format): 
                $Typemoney = Typemoney::model()->findByPk($Format->typemoney); 
                $Moneys = Money::model()->findByPk($Typemoney->money); 
                if($Format->ty_format==1){
                    $Ty_Format="รับสมัคร";
                ?>                             
                <tr>
                    <td><a href="#"  onclick="return addReceipt(<?php echo $Format->id;?>)">
                           <?php echo "<b>ใบเสร็จ: </b>".$Format->name."(".$Format->term.")<b> ประเภท:</b>".$Moneys->name."(".$Typemoney->submoney.")"; ?>
                    </a></td>
                    <td>                
                        <a href="#" onclick="return ShowListReceipt(<?php echo $Format->id;?>)">
                            <i class="glyphicon glyphicon-eye-open"></i> แสดง  
                        </a>
                    </td>
                </tr>
                <?php } endforeach; ?>
            </tbody>
        </table>
        
    </div>
</div>
<div class="panel panel-warning">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
        <b> ใบสำคัญรับเงิน สำหรับการรายงานตัว </b>
    </div>
    <div class="panel-body">
        
        <table class="table">
            <tbody>
                <?php foreach ($Formats as $Format): 
                $Typemoney = Typemoney::model()->findByPk($Format->typemoney); 
                $Moneys = Money::model()->findByPk($Typemoney->money); 
                if($Format->ty_format==2 ){
                    $Ty_Format="รายงานตัว";
                ?>
                <tr>
                    <td><a href="#"  onclick="return addReceipt(<?php echo $Format->id;?>)">
                           <?php echo "<b>ใบเสร็จ: </b>".$Format->name."(".$Format->term.")<b> ประเภท:</b>".$Moneys->name."(".$Typemoney->submoney.")"; ?>
                    </a></td>
                    <td>                
                        <a href="#" onclick="return ShowListReceipt(<?php echo $Format->id;?>)">
                            <i class="glyphicon glyphicon-eye-open"></i> แสดง  
                        </a>
                    </td>
                </tr>
                <?php } endforeach; ?>
            </tbody>
        </table>
        
    </div>
</div>
<div class="panel panel-warning">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
        <b> ใบสำคัญรับเงิน สำหรับการรายงานตัว(ผ่อนผัน) </b>
    </div>
    <div class="panel-body">
        
        <table class="table">
            <tbody>
                <?php foreach ($Formats as $Format): 
                $Typemoney = Typemoney::model()->findByPk($Format->typemoney); 
                $Moneys = Money::model()->findByPk($Typemoney->money); 
                if($Format->ty_format==20){
                    $Ty_Format="รายงานตัว";
                ?>
                <tr>
                    <td><a href="#"  onclick="return addReceipt(<?php echo $Format->id;?>)">
                           <?php echo "<b>ใบเสร็จ: </b>".$Format->name."(".$Format->term.")<b> ประเภท:</b>".$Moneys->name."(".$Typemoney->submoney.")"; ?>
                    </a></td>
                    <td>                
                        <a href="#" onclick="return ShowListReceipt(<?php echo $Format->id;?>)">
                            <i class="glyphicon glyphicon-eye-open"></i> แสดง  
                        </a>
                    </td>
                </tr>
                <?php } endforeach; ?>
            </tbody>
        </table>
        
    </div>
</div>
    <div class="panel panel-success">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
        <b> ใบสำคัญรับเงิน ค่าบำรุงหอพักนักศึกษา </b>
    </div>
    <div class="panel-body">
        
        <table class="table">
            <tbody>
                <?php foreach ($Formats as $Format): 
                $Typemoney = Typemoney::model()->findByPk($Format->typemoney); 
                $Moneys = Money::model()->findByPk($Typemoney->money); 
                if($Format->ty_format==5){
                    $Ty_Format="ค่าบำรุงหอพักนักศึกษา";
                ?>
                <tr>
                    <td><a href="#"  onclick="return addReceipt(<?php echo $Format->id;?>)">
                           <?php echo "<b>ใบเสร็จ: </b>".$Format->name."(".$Format->term.")<b> ประเภท:</b>".$Moneys->name."(".$Typemoney->submoney.")"; ?>
                    </a></td>
                    <td>                
                        <a href="#" onclick="return ShowListReceipt(<?php echo $Format->id;?>)">
                            <i class="glyphicon glyphicon-eye-open"></i> แสดง  
                        </a>
                    </td>
                </tr>
                <?php } endforeach; ?>
            </tbody>
        </table>
        
    </div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
        <b> ใบสำคัญรับเงิน ค่าออกฝึกประสบการณ์ </b>
    </div>
    <div class="panel-body">
        
        <table class="table">
            <tbody>
                <?php foreach ($Formats as $Format): 
                $Typemoney = Typemoney::model()->findByPk($Format->typemoney); 
                $Moneys = Money::model()->findByPk($Typemoney->money); 
                if($Format->ty_format==4){
                    $Ty_Format="ค่าออกฝึกประสบการณ์";
                ?>
                <tr>
                    <td><a href="#"  onclick="return addReceipt(<?php echo $Format->id;?>)">
                           <?php echo "<b>ใบเสร็จ: </b>".$Format->name."(".$Format->term.")<b> ประเภท:</b>".$Moneys->name."(".$Typemoney->submoney.")"; ?>
                    </a></td>
                    <td>                
                        <a href="#" onclick="return ShowListReceipt(<?php echo $Format->id;?>)">
                            <i class="glyphicon glyphicon-eye-open"></i> แสดง  
                        </a>
                    </td>
                </tr>
                <?php } endforeach; ?>
            </tbody>
        </table>
        
    </div>
</div>
</div>


<div class="col-sm-6"> 
<div class="panel panel-danger">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
        <b> ใบสำคัญรับเงิน ค่าบำรุงการศึกษา </b>
    </div>
    <div class="panel-body">
        
        <table class="table" >
            <tbody>
                <?php foreach ($Formats as $Format): 
                $Typemoney = Typemoney::model()->findByPk($Format->typemoney); 
                $Moneys = Money::model()->findByPk($Typemoney->money); 
                if($Format->ty_format==3 and $Typemoney->id < 10){
                    $Ty_Format="ค่าบำรุงการศึกษา";
                ?>
                <tr>
                    <td><a href="#"  onclick="return addReceipt(<?php echo $Format->id;?>)">
                           <?php echo "<b>ใบเสร็จ: </b>".$Format->name."(".$Format->term.")<b> ประเภท:</b>".$Moneys->name."(".$Typemoney->submoney.")"; ?>
                    </a></td>
                    <td>                
                        <a href="#" onclick="return ShowListReceipt(<?php echo $Format->id;?>)">
                            <i class="glyphicon glyphicon-eye-open"></i> แสดง  
                        </a>
                    </td>
                </tr>
                <?php } endforeach; ?>
            </tbody>
        </table>
        
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
        <b> ใบสำคัญรับเงิน สำหรับรายการอื่นๆ </b>
    </div>
    <div class="panel-body">
        
        <table class="table" >
            <tbody>
                <?php foreach ($Formats as $Format): 
                $Typemoney = Typemoney::model()->findByPk($Format->typemoney); 
                $Moneys = Money::model()->findByPk($Typemoney->money); 
                if($Format->ty_format==6){
                    $Ty_Format="อื่นๆ";
                ?>
                <tr>
                    <td><a href="#"  onclick="return addReceipt(<?php echo $Format->id;?>)">
                           <?php echo "<b>ใบเสร็จ: </b>".$Format->name."(".$Format->term.")<b> ประเภท:</b>".$Moneys->name."(".$Typemoney->submoney.")"; ?>
                    </a></td>
                    <td>                
                        <a href="#" onclick="return ShowListReceipt(<?php echo $Format->id;?>)">
                            <i class="glyphicon glyphicon-eye-open"></i> แสดง  
                        </a>
                    </td>
                </tr>
                <?php } endforeach; ?>
            </tbody>
        </table>
        
    </div>
</div>
</div>
</div>
<div id="showdia" title="รายการใบเสร็จ" ><p id="showp"></p></div>