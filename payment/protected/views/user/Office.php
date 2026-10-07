<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
        จัดการข้อมูลหน่วยงาน
    </div>
    <div class="panel-body">
        <form id="formOffice" class="form-inline">
            <div>
                
                <input type="hidden" id="id" name="id" />
                <label> ชื่อหน่วยงาน </label>
                <input type="text" name="name" class="form-control" style="width: 300px;"/>
                <label> รายละเอียด </label>
                <input type="text" name="detail" class="form-control" style="width: 500px;"/>                

                <a href="#" class="btn btn-default" onclick="return saveOffice()">
                    <i class="glyphicon glyphicon-play-circle"></i> Save 
                </a>
                <input type="reset" value="Reset" class="btn btn-default"  />
            </div>            
        </form>
       
        <table class="table table-striped table-bordered" style="margin-top: 20px; " >
            <thead>
                <tr>
                    <th>ชื่อหน่วยงาน</th>
                    <th>รายละเอียด</th>
                    <th style="width: 190px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Offices as $Office): ?>
                <tr>
                    <td><?php echo $Office->name; ?></td>
                    <td><?php echo $Office->detail; ?></td>
                    <td> 
                <a href="#" class="btn btn-success" onclick="return editOffice(<?php echo $Office->id;?>)">
                    <i class="glyphicon glyphicon-edit"></i> Edit 
                </a>
                <a href="#" class="btn btn-danger" onclick="return deleteOffice(<?php echo $Office->id;?>)">
                    <i class="glyphicon glyphicon-trash"></i> Delete 
                </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
