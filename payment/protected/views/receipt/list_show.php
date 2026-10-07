<div class="row" >
<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
        เลือกรูปแบบใบสำคัญรับเงิน
    </div>
    <div class="panel-body">
        
        <table class="table" >
            <tbody>
                <?php foreach ($Formats as $Format): 
                $Typemoney = Typemoney::model()->findByPk($Format->typemoney); 
                $Moneys = Money::model()->findByPk($Typemoney->money); 
               // if($Format->ty_format== Yii::app()->user->User_office){
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
                <?php // } 
                 endforeach; 
                 ?>
            </tbody>
        </table>
        
    </div>
</div>
</div>
<div id="showdia" title="รายการใบเสร็จ" ><p id="showp"></p></div>