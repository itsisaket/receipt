<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
                <?php 
                $Typemoneyadd = Typemoney::model()->findByPk($Formatadd->typemoney); 
                $Moneysadd = Money::model()->findByPk($Typemoneyadd->money);
                ?>
                <label> <b>รูปแบบใบเสร็จ</b> <?php  echo $Formatadd->name; ?> <b>ปีการศึกษา </b> <?php  echo $Formatadd->term." ".$Moneysadd->name." ".$Typemoneyadd->submoney." "; ?></label>
                
    </div>
    <div class="panel-body">
            <div>
                
                <?php $sumP=0; foreach ($Lists as $List): 
                    $Typemoney = Typemoney::model()->findByPk($List->typemoney); 
                    $Moneys = Money::model()->findByPk($Typemoney->money); 
                    $Styles = Styledb::model()->findByAttributes(array('listID'=>$List->id,'formatID'=>$Formatadd->id));
                    if(isset($Styles) ){ 
                        $sumP=$sumP+$List->price;
                        echo " รายการ : <b>".$List->name."</b> จำนวนเงิน : <b>".number_format($List->price,2)."</b> บาท"; ?><br>
                <?php } endforeach;  ?> 
                        <hr>
                        <div align="center"><?php echo "<b>รวมทั้งหมด(ไม่รวมค่าลงทะเบียน) จำนวน ".$sumP." บาท </b>" ;?></div>
            </div>            
    </div>
</div>
