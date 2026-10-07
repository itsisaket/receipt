<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
        ค้นหาข้อมูลรายการใบเสร็จ
    </div>
    <div class="panel-body">
      
        <form id="formSearch" class="form-inline">
            <div>
                <label> ชื่อนักศึกษา </label>
                <input type="text" name="Searchid" class="form-control" style="width: 400px;"/>    
                <a href="#" class="btn btn-default" onclick="return SearchReceipt()">
                    <i class="glyphicon glyphicon-play-circle"></i> Search Receipt 
                </a>
            </div>            
        </form>
  <?php
   // $this->widget('zii.widgets.grid.CGridView',array('dataProvider'=>$ReceiptsAD));
  ?>       
        <table class="table table-striped table-bordered" style="margin-top: 20px; " >
            <thead>
                <tr>
                    <th>นักศึกษา</th>
                    <th>เลขที่ใบเสร็จ</th>
                    <th>ประเภทใบเสร็จ</th>
                    <th>วันที่ออกใบเสร็จ</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Receipts as $Receipt): 
                $Format = Format::model()->findByPk($Receipt->Format_ID); 
                
                ?>
                <tr>
                    <td><?php echo $Receipt->STUName; ?></td>
                    <td><?php echo $Receipt->Receipt_ID; ?></td>
                    <td><?php echo $Format->name; ?></td>
                    <td><?php echo $Receipt->ChackDate; ?></td>
                    <td><a href="#" class="btn btn-success" onclick="return CoppyReceipt(<?php echo $Receipt->ID; ?>)">
                    <i class="glyphicon glyphicon-print"></i> Print Report 
                </a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

      
    </div>
</div>