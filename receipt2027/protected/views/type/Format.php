<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
        จัดการข้อมูลรูปแบบใบเสร็จ
    </div>
    <div class="panel-body">
        <form id="formFormat" class="form-inline">
            <div>
                
                <input type="hidden" id="id" name="id" />
                <label>รูปแบบใบเสร็จ </label>
                <select name="ty_format" class="form-control">  
                    <option value="1">รายการรับสมัคร</option>
                    <option value="2">รายการรายงานตัว</option>
                    <option value="20">รายงานตัว(ผ่อนผัน)</option>
                    <option value="3">รายการลงทะเบียน</option>
                    <option value="4">รายการฝึกประสบการณ์</option>
                    <option value="5">รายการหอพักนักศึกษา</option>
                    <option value="6">รายการอื่นๆ</option>
                </select>
                <label> ปีงบประมาณ </label>
                <select name="term" class="form-control">
                    <option value="2570">2570</option>
                    <option value="2569">2569</option>
                </select>
                <label> ระบุเทอม </label>
                <select name="termid" class="form-control">
                    <option value="1/2570">1/2570</option>
                    <option value="2/2570">2/2570</option>
                    <option value="3/2570">3/2570</option> 
                    <option value="1/2569">1/2569</option>
                    <option value="2/2569">2/2569</option>
                    <option value="3/2569">3/2569</option>                                                                
                </select>                   
                <label> ประเภทรายการใบเสร็จ </label>
                <select name="typemoney" class="form-control">
                <?php 
                foreach ($Typemoneys as $Typemoney):
                $Moneys = Money::model()->findByPk($Typemoney->money);  
                ?>  
                    <option value="<?php echo $Typemoney->id; ?>"><?php echo $Typemoney->id." ".$Typemoney->submoney."(".$Moneys->name.")"; ?></option>
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
                    <th>รูปแบบใบเสร็จ</th>
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
                if($Format->ty_format==1){
                    $Ty_Format="รับสมัคร";
                }else if($Format->ty_format==2){
                    $Ty_Format="รายงานตัว";
                }else if($Format->ty_format==3){
                    $Ty_Format="ลงทะเบียนเรียน";
                }else if($Format->ty_format==4){
                    $Ty_Format="ฝึกประสบการณ์";
                }else if($Format->ty_format==5){
                    $Ty_Format="หอพักนักศึกษา";
                }else if($Format->ty_format==6){
                    $Ty_Format="รายการอื่นๆ";                    
                }else{$Ty_Format="";}
                ?>
                <tr>
                    <td><?php echo "(".$Format->id.") ".$Ty_Format; ?></td>
                    <td><?php echo $Format->term; ?></td>
                    <td><?php echo $Typemoney->id." ".$Typemoney->submoney."(".$Moneys->name.")"; ?></td>
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