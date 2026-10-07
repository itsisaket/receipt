<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
        จัดการข้อมูลรายการต่างๆ
    </div>
    <div class="panel-body">
        <form id="formList" class="form-inline">
            <div>
                
                <input type="hidden" id="id" name="id" />
                <label> ปีการศึกษา </label>
                <select name="term" class="form-control">
                    <option value="2558">2558</option>
                    <option value="2559">2559</option>
                    <option value="2560">2560</option>
                </select>
                
                <label> ประเภทรายการใบเสร็จ </label>
                <select name="typemoney" class="form-control">
                <?php 
                 foreach ($Typemoneys as $Typemoney):
                   $Moneys = Money::model()->findByPk($Typemoney->money);  
                ?>  
                    <option value="<?php echo $Typemoney->id; ?>"><?php echo $Moneys->name."(".$Typemoney->submoney.")"; ?></option>
                 <?php endforeach;?>
                </select>
                <br><br>
                <label> รายการ </label>
                <input type="text" id="name" name="name" class="form-control" style="width: 400px;" />
                <label> จำนวนเงิน </label>
                <input type="text" name="price" class="form-control" style="width: 100px;"/>    
                <label> บาท </label>
                <a href="#" class="btn btn-default" onclick="return SaveList()">
                    <i class="glyphicon glyphicon-play-circle"></i> Save 
                </a>
                <input type="reset" value="Reset" class="btn btn-default"  />
            </div>            
        </form>
       
        <table class="table table-striped table-bordered" style="margin-top: 20px; " >
            <thead>
                <tr>
                    <th>ปีการศึกษา</th>
                    <th>ประเภทใบเสร็จ</th>
                    <th>รายการ</th>
                    <th>จำนวนเงิน</th>
                    <th style="width: 190px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Lists as $List): 
                $Typemoney = Typemoney::model()->findByPk($List->typemoney); 
                $Moneys = Money::model()->findByPk($Typemoney->money); 
                $Chsty=0;
                ?>
                <tr>
                    <td><?php echo $List->term; ?></td>
                    <td><?php echo $Moneys->name."(".$Typemoney->submoney.")"; ?></td>
                    <td><?php echo $List->name; ?></td>
                    <td><div class="right"><?php echo number_format($List->price,2); ?></div></td>
                    <td> 
                        
            <?php 
            $Styles = Styledb::model()->findAllByAttributes(array('listID'=>$List->id)) ;
            //
            foreach ($Styles as $Style): 
                   // echo $Style->formatID;
                    $Formatsty = Format::model()->findByPk($Style->formatID) ;
                   // echo $Formatsty->status;
                    $Chsty = $Formatsty->status;
                    
            endforeach; 
                //  echo $Chsty;
            if($Chsty==0){
            ?>
                <a href="#" class="btn btn-success" onclick="return editList(<?php echo $List->id;?>)">
                    <i class="glyphicon glyphicon-edit"></i> Edit 
                </a>
                <a href="#" class="btn btn-danger" onclick="return deleteList(<?php echo $List->id;?>)">
                    <i class="glyphicon glyphicon-trash"></i> Delete 
                </a>
            <?php } ?>    
                        
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
