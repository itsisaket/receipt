<div><center><h3>รายงานผลการจ่ายเงินค่าหอพัก ตั้งแต่วันที่ 15 ธันวาคม 2558 ถึง 30 พฤษภาคม 2559 จ้า</h3></center></div>
    <div class="col-md-4 col-md-offset-0">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <i class="glyphicon glyphicon-off"></i>
                รายงานข้อมูลหอพักหญิง 2559 จำนวน <?php echo count($DormWoman);?> คน
            </div>
        </div>
    </div>
    <div class="col-md-4 col-md-offset-0">
        <div class="panel panel-success">
            <div class="panel-heading">
                <i class="glyphicon glyphicon-off"></i>
                รายงานข้อมูลหอพักชาย 2559 จำนวน <?php echo count($DormMan);?> คน
            </div>
        </div>
    </div>
    <div class="col-md-4 col-md-offset-0">
        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="glyphicon glyphicon-off"></i>
                รายงานข้อมูลหอพักใหม่ 2559 จำนวน <?php echo count($DormNew);?> คน
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel-body">
            <?php /*
            $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'New',
                'dataProvider' => $dataProviderNew,
                'columns' => array(
                    array('header' => 'รหัสนักศึกษา','name' => 'STU_ID'),
                    array('header' => 'ชื่อนักศึกษา','name' => 'STUName'),
                    array('header' => 'ใบเสร็จ','name' => 'Receipt_ID'),
                    array('header' => 'วันที่บันทึก','name' => 'ChackDate'),
                    ),
            )); */ ?>

       <table class="table table-striped table-bordered" style="margin-top: 20px; " >
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>รหัสนักศึกษา</th>
                    <th>ชื่อนักศึกษา</th>
                    <th>คณะ</th>
                    <th>สาขา</th>
                    <th>เลขที่ใบเสร็จ</th>
                    <th>วันที่ออกใบเสร็จ</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $num=0;
                foreach ($DormAll as $Receipt): 
                $num++;
                ?>
                <tr>
                    <td><?php echo $num; ?></td>
                    <td><?php echo $Receipt->STU_ID; ?></td>
                    <td><?php echo $Receipt->STUName; ?></td>
                    <td><?php //echo $Receipt->CITIZEN_ID; ?></td>
                    <td><?php //echo $Receipt->STUName; ?></td>
                    <td><?php echo $Receipt->Receipt_ID; ?></td>
                    <td><?php echo $Receipt->ChackDate; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>  

        </div>
    </div>