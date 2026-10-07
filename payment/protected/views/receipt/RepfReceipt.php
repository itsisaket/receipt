<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
      รายงานการออกใบสำคัญรับเงิน
    </div>
    <div class="panel-body">
        <form id="formRepFormat" class="form-inline"> 
        <table class="table table-striped table-bordered"  >
            <tbody>                            
                <tr>
                    <td>
                           
                                <select name="FormatsID" class="form-control">
                                    <?php 
                                    foreach ($Formats as $Format): 
                                        $Typemoney = Typemoney::model()->findByPk($Format->typemoney); 
                                        $Moneys = Money::model()->findByPk($Typemoney->money); 
                                    ?>  
                                        <option value="<?php echo $Format->id; ?>"><?php echo "<b>ใบเสร็จ: </b>".$Format->name."(".$Format->term.")<b> ประเภท:</b>".$Moneys->name."(".$Typemoney->submoney.")"; ?></option>
                                    <?php endforeach;?>
                                </select>                                 
                                <select name="Status" class="form-control">
                                    <option value="9">- ใช้งานปกติ - </option>
                                    <option value="0">- ยกเลิก - </option>
                                </select>  
                                <select name="User_id" class="form-control">
                                    <option value="0">-- All User -- </option>
                                    <?php 
                                    foreach ($Users as $user): ?>  
                                        <option value="<?php echo $user->id; ?>"><?php echo $user->name; ?></option>
                                    <?php endforeach;?>
                                </select>                
                                <label> วันที่  </label> <i class="glyphicon glyphicon-calendar"></i> 
                                <input type="text" name="datepicker" class="form-control" style="width: 100px;" value="<?php echo date('Y-m-d') ;?>"/>

                                <a href="#" class="btn btn-success" onclick="return repFormat()">
                                    <i class="glyphicon glyphicon-edit"></i> ออกรายงาน 
                                </a>           
                    </td>
                </tr>
                
            </tbody>
        </table>
        </form>
    </div>
</div>
