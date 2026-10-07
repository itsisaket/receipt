<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-cog"></i>
        รายงานการออกใบสำคัญรับเงิน 
            <?php  
            $Typemoney = Typemoney::model()->findByPk($Formatadd->typemoney); 
            $Moneys = Money::model()->findByPk($Typemoney->money);  
            echo "=> ".$Formatadd->name."<b> ประเภท:</b>".$Moneys->name."(".$Typemoney->submoney.")"; 
            ?>
    </div>
    <div class="panel-body">
       
        <table class="table table-striped table-bordered"  >
            <thead>
                <tr >
		    <th>No.</th>
                    <th ><div align="center"> เลขที่ใบเสร็จ </div></th>
                    <th ><div align="center"> วันที่ออก </div></th>
                    <th ><div align="center"> รหัสประจำตัว </div></th> 
                    <th ><div align="center"> สาขาวิชา </div></th> 
                    <th ><div align="center"> ผู้จ่ายเงิน </div></th>                    
                    <th ><div align="center"> เจ้าหน้าที่ </div></th>
            <?php foreach ($Lists as $List): 
            $Styles = Styledb::model()->findByAttributes(array('listID'=>$List->id,'formatID'=>$Formatadd->id));
            if(isset($Styles) ){             
            ?>
                    <th ><div align="center"><?php echo $List->name ?> </div></td>     
            <?php } endforeach;   ?>
            <?php if($Formatadd->ty_format==2 or $Formatadd->ty_format==3 ){ ?>       
                    <th ><div align="center"> ค่าลงทะเบียน(ธนาคาร) </div></th>
            <?php } ?>  
            <?php if($Formatadd->ty_format==3 or $Formatadd->ty_format==5){ ?>       
                    <th ><div align="center"> ค่าปรับ </div></th>
                    <th ><div align="center"> ค่าธรรมเนียม </div></th>
            <?php } ?>  
                    <th ><div align="center"> รวมเงิน </div></th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $list_price_sum=0; 
            $LP_SUM=0; 
            $no=0;
            $list_price_sum_money=0;
            $list_price_sum_fee=0;

            $list_price_ar = array();

            $arrContextOptions=array(
                "ssl"=>array(
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                ),
            ); 
                foreach ($Receipts as $Receipt):  $no++; 

                            $countID=strlen(trim(@$Receipt->STU_ID));
                            if($countID == 13){
                                $url="http://reg.sskru.ac.th/service/test_get_enroll.php?citizenid=".@$Receipt->STU_ID;
                            }else if($countID == 10){    
                                $url="http://reg.sskru.ac.th/service/serach_by_idno.php?idno=".@$Receipt->STU_ID;   
                            }else{
                                $url="http://reg.sskru.ac.th/service/serach_by_idno.php?idno=".@$Receipt->STU_ID;
                            }
                            $contents = file_get_contents($url,false,stream_context_create($arrContextOptions));
                            $decode = json_decode($contents, true);

                    //$pro = $decode['PROGRAM_NAME_TH'];
                    $pro = "-";
     

            ?>  
                
                <tr>
		    <td><?php echo $no; if($Receipt->Mtransfer=="T"){ $Mt="(เงินโอน)"; }else{ $Mt="";} ?></td>
                    <td><?php echo $Receipt->Receipt_ID.$Mt; if($f==0){ echo "(ยกเลิก)" ; } ?>
                        <a target="_blank" href="index.php?r=receipt/ReceiptSevenCopp2&&ss=<?php echo trim($Receipt->Receipt_ID); ?>" class="btn btn-success" >
                        <i class="glyphicon glyphicon-print"></i> Print </a>
                    </td>
                    <td><?php echo $Receipt->ChackDate; ?></td>
                    <td><?php echo $Receipt->STU_ID; ?></td>
                    <td><?php echo $pro; ?></td>
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
            <?php if($Formatadd->ty_format==2 or $Formatadd->ty_format==3 ){ $sumP=$sumP+$Receipt->PRICE; ?>       
                    <td><div align="right"><?php echo number_format($Receipt->PRICE,2); $list_price_sum= $list_price_sum+$Receipt->PRICE ?></div></td>
            <?php } ?> 
            <?php if($Formatadd->ty_format==3 or $Formatadd->ty_format==5){ 
                $Fines = Fine::model()->findallByAttributes(array('Receipt_ID'=>$Receipt->Receipt_ID));
                $FineP=0;
                $FineP_money=0;
                $FineP_fee=0;
                if(count($Fines)!=0){  
                    foreach ($Fines as $Fine9): 
                        //echo $Fine9->Receipt_ID;
                        $FineP = $Fine9->Fine_money+$Fine9->Fine_fee;
                        $FineP_money = $Fine9->Fine_money;
                        $FineP_fee = $Fine9->Fine_fee;
                    endforeach;
                }
                        $sumP=$sumP+$FineP;
                   
                ?>       
                    <td><div align="right"><?php echo number_format($FineP_money,2);  $list_price_sum_money = $list_price_sum_money+$FineP_money ?></div></td>

                    <td><div align="right"><?php echo number_format($FineP_fee,2); $list_price_sum_fee = $list_price_sum_fee+$FineP_fee ?></div></td>
            <?php   } ?>        
                    <td><div align="right"><?php echo number_format($sumP,2); ?></div></td>
                </tr>



                
            <?php endforeach;  $li=0; ?>
                   <tr>
                    <td colspan="5"> --</td>
                        <?php    foreach ($Lists as $List): 
                            $Styles = Styledb::model()->findByAttributes(array('listID'=>$List->id,'formatID'=>$Formatadd->id));
                            if(isset($Styles) ){             
                        ?> <td><div align="right">
                            <?php //$LP=0; for($l=0 ; $l<count($list_price_ar[$li]); $l++ ){ $LP=$LP+$list_price_ar[$li][$l];  }
                                //echo number_format($LP,2);?>
                            <?php
                            $LP = 0;
                            // 👇 เช็กก่อนว่า index นี้มีจริง และเป็น array
                            if (isset($list_price_ar[$li]) && is_array($list_price_ar[$li])) {
                                foreach ($list_price_ar[$li] as $price) {
                                    $LP += $price;
                                }
                            }
                            echo number_format($LP, 2);
                            ?>

                            </div></td>
                            <?php $LP_SUM=$LP_SUM+$LP; $li++;  } ?>     
                           <?php endforeach;?>
                           <?php if($Formatadd->ty_format==2 or $Formatadd->ty_format==3 ){ $LP_SUM=$LP_SUM+$list_price_sum;?>       
                            <td><div align="right"><?php echo number_format($list_price_sum,2);?></div></td>
                        <?php } ?>  
                        <?php if($Formatadd->ty_format==3 or $Formatadd->ty_format==5){ $LP_SUM=$LP_SUM+$list_price_sum_money+$list_price_sum_fee;?>  
                            <td><div align="right"><?php echo number_format($list_price_sum_money,2);?></div></td>     
                            <td><div align="right"><?php echo number_format($list_price_sum_fee,2);?></div></td>
                        <?php } ?>  
                            <td><div align="right"><?php echo number_format($LP_SUM,2);?></div></td>  
                </tr>         
            </tbody>
        </table> 

    </div>
</div>

