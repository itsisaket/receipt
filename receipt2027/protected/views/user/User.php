<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
        จัดการข้อมูลผู้ใช้งาน
    </div>
    <div class="panel-body">
        <form id="formUser" class="form-inline">
            <div>
                <input type="hidden" name="id" />
                <label> ชือ นามสกุล </label>
                <input type="text" name="name" class="form-control" style="width: 400px;"/>
                <label> หน่ยงาน </label>
                <select name="office" class="form-control">
                 <?php 
                 foreach ($Offices as $Office): ?>  
                    <option value="<?php echo $Office->id; ?>"><?php echo $Office->name; ?></option>
                 <?php endforeach;?>
                </select>
                <label> สถานะการใช้งาน </label>
                <select  name="status" class="form-control">
                 <?php 
                 foreach ($Statuss as $status): ?>  
                    <option value="<?php echo $status->id; ?>"><?php echo $status->name; ?></option>
                 <?php endforeach;?>
                </select>
                <br><br>                  
                <label> UserName </label>
                <input type="text" name="ulogin" class="form-control">
                <label> Password </label>
                <input type="password" name="password" class="form-control" style="width: 200px;"> 
                <a href="#" class="btn btn-default" onclick="return SaveUser()">
                    <i class="glyphicon glyphicon-play-circle"></i> Save 
                </a> 
                <input type="reset" value="Reset" class="btn btn-default"  />
            </div>           
        </form>
<?php // echo "Show : $test "; ?>
        
        <table class="table table-striped table-bordered" style="margin-top: 20px; " >
            <thead>
                <tr>
                    <th>ชื่อ นามสกุล</th>
                    <th>หน่วยงาน</th>
                    <th>สถานะ</th>
                    <th>UserLogin</th>
                    <th style="width: 190px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Users as $Use): 
                    $Offices = Office::model()->findByPk($Use->office);
                    $Statuss = Status::model()->findByPk($Use->status);
                ?>  
                <tr>
                    <td><?php echo $Use->name; ?></td>
                    <td><?php echo $Offices->name; ?></td>
                    <td><?php echo $Statuss->name; ?></td>
                    <td><?php echo $Use->username; ?></td>
                    <td> 
                <a href="#" class="btn btn-success" onclick="return editUser(<?php echo $Use->id; ?>)">
                    <i class="glyphicon glyphicon-edit"></i> Edit 
                </a>
                <a href="#" class="btn btn-danger" onclick="return deleteUser(<?php echo $Use->id; ?>)">
                    <i class="glyphicon glyphicon-trash"></i> Delete 
                </a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
