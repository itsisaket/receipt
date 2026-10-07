<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
        จัดการข้อมูลผู้ใช้งาน
    </div>
    <div class="panel-body">
        
        <table class="table table-striped table-bordered" style="margin-top: 20px; " >
            <tbody>
                <?php foreach ($Users as $Use): 
                    $Offices = Office::model()->findByPk($Use->office);
                    $Statuss = Status::model()->findByPk($Use->status);
                ?>  
                <tr>
                    <td><?php echo $Use->name; ?></td>
                    <td><?php echo $Offices->name; /* onclick="return RepUser(<?php echo $Use->id; ?>)" */ ?> </td>
                    <td>
                        <form id="formRepUser" class="form-inline">
                            <div>                
                                <label> วันที่  </label> <i class="glyphicon glyphicon-calendar"></i> 
                                <input name="datepicker" class="form-control" style="width: 100px;" value="<?php echo date('Y-m-d') ;?>"> 
                                <input type="hidden" name="User_ID" value="<?php echo $Use->id; ?>"/>
                                <a href="#" class="btn btn-success" onclick="return RepFormat()>
                                    <i class="glyphicon glyphicon-edit"></i> ออกรายงาน 
                                </a>
                            </div>           
                        </form>


                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
