            <?php 
                $Typemoneyadd = Typemoney::model()->findByPk($Formatadd->typemoney); 
                $Moneysadd = Money::model()->findByPk($Typemoneyadd->money);
                if($Formatadd->ty_format==1){
                    $Ty_Format="รับสมัคร";
                }else if($Formatadd->ty_format==2){
                    $Ty_Format="รายงานตัว";
                }else if($Formatadd->ty_format==3){
                    $Ty_Format="ลงทะเบียนเรียน";
                }else if($Formatadd->ty_format==4){
                    $Ty_Format="รายการฝึกประสบการณ์";
                }else if($Formatadd->ty_format==5){
                    $Ty_Format="รายการหอพักนักศึกษา";       
                }else if($Formatadd->ty_format==6){
                    $Ty_Format="อื่นๆ"; 
                }else if($Formatadd->ty_format==20){
                    $Ty_Format="รายงานตัว(ผ่อนผัน)"; 
                }else{$Ty_Format="";}
                
                
                $sumS=0;
                    foreach ($Lists as $List):
                    $Styles = Styledb::model()->findByAttributes(array('listID'=>$List->id,'formatID'=>$Formatadd->id));
                    if(isset($Styles) ){ $sumS=$sumS+$List->price; }                       
                    endforeach;

                    ?>
<div class="row">
    <p><center><h3><?php echo "Date: ".Date('d-m-Y H:i:s')."";?></h3></center></p>
    <div class="col-sm-6">
        <div class="panel panel-success">
   <div class="panel-heading">
        <i class="glyphicon glyphicon-user"></i>
<label> <b> รูปแบบใบเสร็จ</b> <?php  echo $Formatadd->name; ?> <b>ปีการศึกษา </b> <?php  echo $Formatadd->term." ".$Moneysadd->name."  ใบเสร็จ".$Ty_Format." ".$Typemoneyadd->submoney." "; ?></label>
    </div>

    <style>
                input[type="checkbox"].form-control {
                    width: 15px; /* ปรับความกว้าง */
                    height: 15px; /* ปรับความสูง */
                    transform: scale(1.5); /* เพิ่มขนาดโดยการสเกล */
                    cursor: pointer; /* เพิ่มความชัดเจนว่าเป็นองค์ประกอบแบบคลิกได้ */
                }
    </style>
    <div class="panel-body">           
        <form id="formReceipt" class="form-inline" onsubmit="return saveReceipt()" ;>
        <h4> 
            <div>
                <label style=" color: #f19">  กรณีโอนเงิน ให้ติ๊กก่อนบันทึก : </label>
                <input type="checkbox" class="form-control" name="Mtransfer" value="T">  
            </div>
            <p>
            <div >
                <label> กรุณากรอกรหัส : </label>
                <input type="text" name="CITIZEN_ID" class="form-control" style="width: 400px;" />
            </div> 
            </p>
            <p> 

            <?php 
            if($Formatadd->ty_format == 3 or $Formatadd->ty_format == 5){ ?>
            <div >           
                    
                <label style=" color: #f10" > กรณีเสียค่าปรับ : </label>
                <input type="text" name="Fine" class="form-control" style="width: 100px;" value="0" />
                <label style=" color: #f10"> กรณีเสียค่าธรรมเนียม : </label>
                <input type="text" name="Fee" class="form-control" style="width: 100px;" value="0" />
                
                
            </div> 
            
            <?php } ?>
            </p>
        </h4>    
            <div >
                <input type="hidden" name="Format_ID" value="<?php  echo $Formatadd->id; ?>"/>
                <input type="hidden" name="TY_Format_ID" value="<?php  echo $Formatadd->ty_format; ?>"/>
                <input type="hidden" name="User_ID" value="<?php echo Yii::app()->user->User_id; ?>"/>
                <input type="hidden" name="Money_ID" value="<?php echo $Moneysadd->id ; ?>"/>
                <input type="hidden" name="sumS" value="<?php echo $sumS ;?>"/>
                
                <a href="#" class="btn btn-default" onclick="return saveReceipt()">
                    <i class="glyphicon glyphicon-saved"></i> Save 
                </a>
            </div>           
        </form>
        <br>
        <div>
            <label style=" color: #f00">  * กรุณาตรวจสอบข้อมูลก่อนออกใบสำคัญรับเงิน</label>
            
        </div>
                 
           
    </div>
</div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-primary">
   <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>

                <label> <b>ตัวอย่าง : รูปแบบใบเสร็จ</b> <?php  echo $Formatadd->name; ?> <b>ปีการศึกษา </b> <?php  echo $Formatadd->term." ".$Moneysadd->name."  ใบเสร็จ".$Ty_Format." ".$Typemoneyadd->submoney." "; ?></label>
    </div>
    <div class="panel-body">   
  <table class="table table-striped" >
    <thead>
        <tr >
            <th ><div align="center"> รายการ </div></th>
            <th ><div align="center"> จำนวนเงิน </div></th>
        </tr>
    </thead>
    <tbody>
            <div>
                <?php 
                    $sumP=0;
                    foreach ($Lists as $List): 
                    $Typemoney = Typemoney::model()->findByPk($List->typemoney); 
                    $Moneys = Money::model()->findByPk($Typemoney->money); 
                    $Styles = Styledb::model()->findByAttributes(array('listID'=>$List->id,'formatID'=>$Formatadd->id));
                    if(isset($Styles) ){ 
                    $sumP=$sumP+$List->price;
                ?>
        <tr>        
            <td ><?php echo $List->name ;?></td>
            <td ><div align="right"><?php echo number_format($List->price,2) ;?></div></td>  
        </tr>    
                <?php } endforeach;   ?>
        <tr class="danger">        
            <td ><div align="center"><b>รวมทั้งหมด(ไม่รวมค่าธรรมเนียม)</b></div> </td>
            <td  ><div align="right"><?php echo number_format($sumP,2);?></div></td>  
        </tr> 
            </div>
      
    </tbody>
   </table>            
    </div>
</div>
    </div>
</div>
