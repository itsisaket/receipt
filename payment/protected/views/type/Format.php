<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
        จัดการข้อมูลรูปแบบใบเสร็จ
    </div>
    <div class="panel-body">
        <form id="formFormat" class="form-inline">
            <div>
                
                <input type="hidden" id="id" name="id" />
                <input type="hidden" id="ty_format" name="ty_format" value="<?php echo Yii::app()->user->User_office ?>" />

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
                <label> ชื่อรูปแบบใบเสร็จ </label>
                <input type="text" id="name" name="name" class="form-control" style="width: 500px;" />
                <a href="#" class="btn btn-default" onclick="return SaveFormat()">
                    <i class="glyphicon glyphicon-play-circle"></i> Save 
                </a>
                <input type="reset" value="Reset" class="btn btn-default"  />
            </div>            
        </form>

        <table class="table table-striped table-bordered" style="margin-top: 20px; " >
            <thead>
                <tr>

                    <th>ปีการศึกษา</th>
                    <th>ประเภทรายการใบเสร็จ</th>
                    <th>ชื่อรูปแบบใบเสร็จ</th>
                    <th style="width: 160px;"></th>
                    <th style="width: 190px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Formats as $Format): 
                $Typemoney = Typemoney::model()->findByPk($Format->typemoney); 
                $Moneys = Money::model()->findByPk($Typemoney->money); 

                ?>
                <tr>

                    <td><?php echo $Format->term; ?></td>
                    <td><?php echo $Moneys->name."(".$Typemoney->submoney.")"; ?></td>
                    <td><?php echo $Format->name; ?></td>
                        <?php if($Format->status==0){ ?>
                    <td> 
                <a href="#" class="btn btn-default" onclick="return addFormat (<?php echo $Format->id;?>)">
                    <i class="glyphicon glyphicon-floppy-disk"></i> Add Data List  
                </a>
                    </td> 
                    <td> 
                <a href="#" class="btn btn-success" onclick="return editFormat(<?php echo $Format->id;?>)">
                    <i class="glyphicon glyphicon-edit"></i> Edit 
                </a>
                <a href="#" class="btn btn-danger" onclick="return deleteFormat(<?php echo $Format->id;?>)">
                    <i class="glyphicon glyphicon-trash"></i> Delete 
                </a>                       
                    </td>
                        <?php }else{ ?>
                    <td>                
                <a href="#" class="btn btn-block" onclick="return ShowFormat(<?php echo $Format->id;?>)">
                    <i class="glyphicon glyphicon-eye-open"></i> Show Data List  
                </a>
                    </td>
                    <td>
                        
                    </td>
                        <?php } ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>
</div>
<div id="dialog_add"  title="เลือกรายการในใบเสร็จ" ><p id="p"></p></div>