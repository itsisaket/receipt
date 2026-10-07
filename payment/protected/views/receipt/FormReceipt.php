        <div class="panel panel-success">
   <div class="panel-heading">
        <i class="glyphicon glyphicon-user"></i>
<label> <b> ยกเลิกใบสำคัญรับเงิน</b> </label>
    </div>

    <div class="panel-body">            
        <form id="formDelReceipt" class="form-inline" >
            <div>                
                <label> กรุณากรอกเลขที่ใบสำคัญรับเงิน : </label>
                <input type="text" name="Receipt_ID" class="form-control" style="width: 200px;" />
                <label> หมายเหตุ : </label>
                <input type="text" name="Comment" class="form-control" style="width: 400px;" />
                <input type="hidden" name="User_ID" value="<?php echo Yii::app()->user->User_id; ?>"/>
                <a href="#" class="btn btn-success" onclick="return DelReceipt()">
                    <i class="glyphicon glyphicon-eye-close"></i> ยกเลิกใบสำคัญรับเงิน 
                </a>
            </div>           
        </form>
        <br>
        <div>
            <label style=" color: #f00"> * กรุณาตรวจสอบข้อมูลก่อน....ยกเลิกใบสำคัญรับเงิน </label>
            
        </div>
                 
           
    </div>
</div>
