<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
        รายงานการออกใบสำคัญรับเงิน
    </div>
    <div class="panel-body">
       
        <table class="table table-striped table-bordered"  >
            <thead>
                <tr >
		    <th>No.</th>
                    <th ><div align="center"> เลขที่ใบเสร็จ </div></th>
                    <th ><div align="center"> วันที่ออก </div></th>
                    <th ><div align="center"> ผู้จ่ายเงิน </div></th>                    
                    <th ><div align="center"> เจ้าหน้าที่ </div></th>
            <?php foreach ($Lists as $List): 
            $Styles = Styledb::model()->findByAttributes(array('listID'=>$List->id,'formatID'=>$Formatadd->id));
            if(isset($Styles) ){             
            ?>
                    <th ><div align="center"><?php echo $List->name ?> </div></td>     
            <?php } endforeach;   ?>
            <?php if($Formatadd->ty_format==2 or $Formatadd->ty_format==3){ ?>       
                    <th ><div align="center"> ค่าลงทะเบียน </div></th>
            <?php } ?>  
                    <th ><div align="center"> รวมเงิน </div></th>
                </tr>
            </thead>
            <tbody>
            <?php $list_price_sum=0; $LP_SUM=0; $no=0;
                foreach ($Receipts as $Receipt):  $no++; ?>  
                <tr>
		    <td><?php echo $no; ?></td>
                    <td><?php echo $Receipt->Receipt_ID; if($f==0){ echo "(ยกเลิก)" ; } ?></td>
                    <td><?php echo $Receipt->ChackDate; ?></td>
                    <td><?php echo $Receipt->STUName; ?></td>
                    <?php $Users = User::model()->findByPk($Receipt->User_ID);?>
                    <td><?php echo $Users->name; ?></td>
            <?php  $sumP=0; $si=0; foreach ($Lists as $List): 
            $Styles = Styledb::model()->findByAttributes(array('listID'=>$List->id,'formatID'=>$Receipt->Format_ID));
            if(isset($Styles) ){ $sumP=$sumP+$List->price;    
            $list_price_ar[$si][]=$List->price;	
            ?>
                    <td ><div align="right"><?php echo number_format($List->price,2) ;?></div></td>     
            <?php $si++; } endforeach;   ?>
            <?php if($Formatadd->ty_format==2 or $Formatadd->ty_format==3){ $sumP=$sumP+$Receipt->PRICE; ?>       
                    <td><div align="right"><?php echo number_format($Receipt->PRICE,2); $list_price_sum= $list_price_sum+$Receipt->PRICE ?></div></td>
            <?php } ?>        
                    <td><div align="right"><?php echo number_format($sumP,2); ?></div></td>
                </tr>

            <?php endforeach;  $li=0; ?>
                   <tr>
                    <td colspan="5"> --</td>
                        <?php    foreach ($Lists as $List): 
                            $Styles = Styledb::model()->findByAttributes(array('listID'=>$List->id,'formatID'=>$Formatadd->id));
                            if(isset($Styles) ){             
                        ?> <td><div align="right">
                            <?php $LP=0; for($l=0 ; $l<count($list_price_ar[$li]); $l++ ){ $LP=$LP+$list_price_ar[$li][$l];  }
                               echo number_format($LP,2);?>
                            </div></td>
                            <?php $LP_SUM=$LP_SUM+$LP; $li++;  } ?>     
                           <?php endforeach;?>
                        <?php if($Formatadd->ty_format==2 or $Formatadd->ty_format==3){ $LP_SUM=$LP_SUM+$list_price_sum;?>       
                            <td><div align="right"><?php echo number_format($list_price_sum,2);?></div></td>
                        <?php } ?>  
                            <td><div align="right"><?php echo number_format($LP_SUM,2);?></div></td>  
                </tr>         
            </tbody>
        </table> 

    </div>
</div>

