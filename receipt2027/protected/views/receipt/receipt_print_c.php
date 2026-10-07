<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = 
          "<html><head><title></title></head><body>" + 
          divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
		// window.close();
    }

</script>
    <?php 
function displaydate($x) {
	$thai_m=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$date_array=explode("-",$x);
	
	$d=$date_array[2];
	$m=$date_array[1]-1;
	$y=$date_array[0];
	
	$m=$thai_m[$m];
	$y=$y+543;

	$displaydate=" $d  $m  $y";
	return $displaydate;
	}
function ThaiBahtConversion($amount_number){
    $amount_number = number_format($amount_number, 2, ".","");
    //echo "<br/>amount = " . $amount_number . "<br/>";
    $pt = strpos($amount_number , ".");
    $number = $fraction = "";
    if ($pt === false) 
        $number = $amount_number;
    else
    {
        $number = substr($amount_number, 0, $pt);
        $fraction = substr($amount_number, $pt + 1);
    }
    //list($number, $fraction) = explode(".", $number);
    $ret= "";
    $baht = ReadNumber($number);
    if ($baht != "")
        $ret.= $baht . "บาท";
    
    $satang = ReadNumber($fraction);
    if ($satang != "")
        $ret.=  $satang . "สตางค์";
    else 
        $ret.= "ถ้วน";
    //return iconv("UTF-8", "TIS-620", $ret);
    return $ret;
}
function ReadNumber($number)
{
    $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
    $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $number = $number + 0;
    $ret = "";
    if ($number == 0) return $ret;
    if ($number > 1000000)
    {
        $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
        $number = intval(fmod($number, 1000000));
    }
    
    $divider = 100000;
    $pos = 0;
    while($number > 0)
    {
        $d = intval($number / $divider);
        $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" : 
            ((($divider == 10) && ($d == 1)) ? "" :
            ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
        $ret .= ($d ? $position_call[$pos] : "");
        $number = $number % $divider;
        $divider = $divider / 10;
        $pos++;
    }
    return $ret;
}
//END function 
 
?> 

<center>
<a href="#" class="btn btn-danger"  onClick="javascript:printDiv('printMe')">
    <i class="glyphicon glyphicon-saved"></i> Print  
</a>   
<a href="#" class="btn btn-danger"  onclick="return configSearch()">
   <i class="glyphicon glyphicon-saved"></i> Close 
</a>
    <hr>

<div class="row" id="printMe" style=" background: #ffffff; width: 100%;">
<?php foreach ($Receipts as $Receipt): 

                          $CITIZEN_ID=$Receipt->CITIZEN_ID ;
                          $Stu_id=$Receipt->STU_ID ;
                          $STUName=$Receipt->STUName ;
                          $PRICE=$Receipt->PRICE ;
                          $stu_type=$Receipt->STU_TYPE ;
                          $Format_ID=$Receipt->Format_ID ;
                          $price_sum=$Receipt->PRICE_SUM ;
                          $User_ID=$Receipt->User_ID ;
                          $ChackDate=$Receipt->ChackDate ;
                          $STATUS=$Receipt->STATUS ;
                          $Receipt_ID=$Receipt->Receipt_ID ;    
                          $PROGRAM="-";
                          $FAC="-";
            $Auser = User::model()->findByPk($Receipt->User_ID);
            $Formatadd = Format::model()->findByPk($Receipt->Format_ID);
            $Typemoneys = Typemoney::model()->findByPk($Formatadd->typemoney);
            $Lists = Listdb::model()->findAllByAttributes(array('term'=>$Formatadd->term,'money'=>['5',$Typemoneys->money]),array('order'=>'money'));
            $Money_id = Money::model()->findByPk($stu_type);
?>
<table style=" width: 99%">

          <tr>
              <td style=" height:20px;  width: 511px;"><div align="right">เล่มที่ <?php  echo substr($Receipt_ID,5,8);?> เลขที่ <?php  echo substr($Receipt_ID,14,3);?> &nbsp;&nbsp;&nbsp;&nbsp;</div></td>
              <td style=" height:20px;  width: 17px;" valign="top"  >&nbsp;</td>
              <td style=" height:20px;  width: 35px;" valign="top" >&nbsp;</td>
              <td style=" height:20px;  width: 460px;" ><div align="right">เล่มที่ <?php  echo substr($Receipt_ID,5,8);?> เลขที่ <?php  echo substr($Receipt_ID,14,3);?> &nbsp;&nbsp;&nbsp;&nbsp;</div></td>
          </tr>
          <tr>
              <td style=" height:58px; ">  </td>
              <td valign="top" >&nbsp;</td>
              <td valign="top" >&nbsp;</td>
              <td style=" height:50px; ">  </td>
          </tr>
          <tr>
              <td style=" height:20px; "><div align="center"> วันที่ <?php echo displaydate($ChackDate);?></div></td>
              <td valign="top" >&nbsp;</td>
              <td valign="top" >&nbsp;</td>
              <td style=" height:20px; "><div align="center"> วันที่ <?php echo displaydate($ChackDate);?></div></td>
          </tr>
          <tr>
              <td style=" height:20px; ">  </td>
              <td valign="top" >&nbsp;</td>
              <td valign="top" >&nbsp;</td>
              <td style=" height:20px; ">  </td>
          </tr>
          <tr>
              <td style=" height:20px; "> ได้รับเงินจาก <?php echo $STUName ;?> &nbsp;&nbsp;รหัสนักศึกษา <?php echo $Stu_id ;?>&nbsp;&nbsp; นักศึกษา <?php echo $Money_id->name ;?></td>
              <td valign="top" >&nbsp;</td>
              <td valign="top" >&nbsp;</td>
              <td style=" height:20px; "> ได้รับเงินจาก <?php echo $STUName ;?> &nbsp;&nbsp;รหัสนักศึกษา <?php echo $Stu_id ;?>&nbsp;&nbsp; นักศึกษา <?php echo $Money_id->name ;?></td>
          </tr>
          <tr>
              <td style=" height:20px; "> สาขาวิชา  <?php echo $PROGRAM ;?> &nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $FAC ;?></td>
              <td valign="top" >&nbsp;</td>
              <td valign="top" >&nbsp;</td>
              <td style=" height:20px; "> สาขาวิชา  <?php echo $PROGRAM ;?> &nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $FAC ;?></td>
          </tr>
          <tr>
              <td style=" height:20px; "> ตามรายการต่อไปนี้ </td>
              <td valign="top" >&nbsp;</td>
              <td valign="top" >&nbsp;</td>
              <td style=" height:20px; "> ตามรายการต่อไปนี้ </td>
          </tr>
          <tr>
              <td style=" height:380px; vertical-align: top;"><div align="right">
                      <table style=" width: 98%; vertical-align: top;" >
                    <thead >
                        <tr style=" height:30px; background: #cccccc " >
                            <th ><div align="center"> รายการ </div></th>
                            <th ><div align="center"> จำนวนเงิน </div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($PRICE!=0){ $sumP = $PRICE; ?>
                        <tr>        
                            <td ><div align="left"><?php echo $Formatadd->name;?></div> </td>
                            <td ><div align="right"><?php echo number_format($PRICE,2);?></div></td>  
                        </tr>
                        <?php }else{ $sumP = 0 ;} ?>
                                <?php 
                                    //$sumP=0;
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
                                <?php } endforeach;  ?>
                        <tr >        
                            <td ><div align="center"><b>รวมทั้งหมด</b></div> </td>
                            <td ><div align="right"><?php echo number_format($sumP,2);?></div></td>  
                        </tr>
                        <tr >        
                            <td colspan="2"><div align="center">จำนวนเงินตัวอักษร( <b><?php echo ThaiBahtConversion($sumP);?></b>)</div> </td> 
                        </tr>                       
                    </tbody>
                    </table>
                  </div></td>
                  <td valign="top" >&nbsp;</td>
                  <td valign="top" >&nbsp;</td>
                  <td style=" height:380px; vertical-align: top;"><div align="right">
                      <table style=" width: 98%; vertical-align: top;" >
                    <thead >
                        <tr style=" height:30px; background: #cccccc " >
                            <th ><div align="center"> รายการ </div></th>
                            <th ><div align="center"> จำนวนเงิน </div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($PRICE!=0){ $sumP = $PRICE; ?>
                        <tr>        
                            <td ><div align="left"><?php echo $Formatadd->name;?></div> </td>
                            <td ><div align="right"><?php echo number_format($PRICE,2);?></div></td>  
                        </tr>
                        <?php }else{ $sumP = 0 ;} ?>
                                <?php 
                                    //$sumP=0;
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
                                <?php } endforeach;  ?>
                        <tr >        
                            <td ><div align="center"><b>รวมทั้งหมด</b></div> </td>
                            <td ><div align="right"><?php echo number_format($sumP,2);?></div></td>  
                        </tr>
                        <tr >        
                            <td colspan="2"><div align="center">จำนวนเงินตัวอักษร( <b><?php echo ThaiBahtConversion($sumP);?></b>)</div> </td> 
                        </tr>                       
                    </tbody>
                    </table>
                  </div></td>
          </tr>
           <tr>
               <td> ได้รับเงินไว้ถูกต้องแล้ว (โปรดเก็บใบเสร็จรับเงินนี้ไว้เพื่อเป็นหลักฐาน) </td>
               <td valign="top" >&nbsp;</td>
               <td valign="top" >&nbsp;</td>
               <td> ได้รับเงินไว้ถูกต้องแล้ว (โปรดเก็บใบเสร็จรับเงินนี้ไว้เพื่อเป็นหลักฐาน) </td>
           </tr>
           <tr>
               <td style=" height:20px; ">  </td>
               <td valign="top" >&nbsp;</td>
               <td valign="top" >&nbsp;</td>
           </tr>
           <tr>
               <td style=" height:20px; "><div align="center">ลงชื่อ ................................. ผู้รับเงิน </div></td>
               <td valign="top" >&nbsp;</td>
               <td valign="top" >&nbsp;</td>
               <td style=" height:20px; "><div align="center">ลงชื่อ ................................. ผู้รับเงิน </div></td>
           </tr>
           <tr>
               <td style=" height:20px; "><div align="center"> ( <?php echo $Auser->name?> )</div> </td>
               <td valign="top" >&nbsp;</td>
               <td valign="top" >&nbsp;</td>
               <td style=" height:20px; "><div align="center"> ( <?php echo $Auser->name?> )</div> </td>
           </tr>
           <tr>
               <td style=" height:20px; "><div align="center"> ผู้รับมอบอำนาจจากอธิการบดี </div></td>
               <td valign="top" >&nbsp;</td>
               <td valign="top" >&nbsp;</td>
               <td style=" height:20px; "><div align="center"> ผู้รับมอบอำนาจจากอธิการบดี </div></td>
           </tr>
        </table>    
   <?php endforeach; ?>

</div>
</center>
