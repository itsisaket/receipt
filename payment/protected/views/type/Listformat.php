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
        <form id="formListformat" class="form-inline">
            <div>

                <?php foreach ($Lists as $List): 
                    $Typemoney = Typemoney::model()->findByPk($List->typemoney); 
                    $Moneys = Money::model()->findByPk($Typemoney->money); 
                    $Styles = Styledb::model()->findByAttributes(array('listID'=>$List->id,'formatID'=>$Formatadd->id));
                    if(isset($Styles) ){ $check='checked'; }else{ $check='';}
                ?>
                <input type="checkbox"  name="addList[]" <?php  echo $check ; ?> value="<?php echo $List->id; ?>" /> <?php echo " รายการ ".$List->name." จำนวนเงิน ".number_format($List->price,2)." บาท"; ?><br>
                    <input type="hidden" name="price[<?php echo $List->id; ?>]" value="<?php echo $List->price;?>" />
                    <input type="hidden" name="formatID[]" value="<?php echo $Formatadd->id;?>" />
                    
                <?php endforeach;   ?>
                <br><br><a href="#" id="btnDone" class="btn btn-default" onclick="return SaveListformat()">
                    <i class="glyphicon glyphicon-play-circle"></i> Save / Update
                </a>
            </div>            
        </form>
    </div>
</div>
