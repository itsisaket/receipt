<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
        จัดการข้อมูลประเภทรายการใบเสร็จ
    </div>
    <div class="panel-body">
        <form id="formType" class="form-inline">
            <div>
                
                <input type="hidden" id="id" name="id" />
                 <input type="hidden" id="term" name="term" value="2564"/>
                <label> ประเภทรายการใบเสร็จ ประเภทนักศึกษา </label>
                <select name="money" class="form-control">
                 <?php 
                 foreach ($Moneys as $Money): ?>  
                    <option value="<?php echo $Money->id; ?>"><?php echo $Money->name; ?></option>
                 <?php endforeach;?>
                </select>
                <label> อื่นๆ </label>
                <input type="text" name="submoney" class="form-control" style="width: 500px;"/>    

                <a href="#" class="btn btn-default" onclick="return SaveType()">
                    <i class="glyphicon glyphicon-play-circle"></i> Save 
                </a>
                <input type="reset" value="Reset" class="btn btn-default"  />
            </div>            
        </form>
       
        <table class="table table-striped table-bordered" style="margin-top: 20px; " >
            <thead>
                <tr>
                    <th>รหัส</th>
                    <th>ประเภทนักศึกษา</th>
                    <th>รายละเอียด</th>
                    <th style="width: 190px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Types as $Type): 
                $Money = Money::model()->findByPk($Type->money); 
                
                ?>
                <tr>
                    <td><?php echo $Type->id; ?></td>
                    <td><?php echo $Money->name; ?></td>
                    <td>รหัส <?php echo $Type->id; ?> <?php echo $Money->name; ?> <?php echo $Type->submoney; ?></td>
                    <td> 
                <a href="#" class="btn btn-success" onclick="return editType(<?php echo $Type->id;?>)">
                    <i class="glyphicon glyphicon-edit"></i> Edit 
                </a>
                <a href="#" class="btn btn-danger" onclick="return deleteType(<?php echo $Type->id;?>)">
                    <i class="glyphicon glyphicon-trash"></i> Delete 
                </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
