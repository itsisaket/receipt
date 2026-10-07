<?php
class ReceiptController extends Controller{
    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    public function actionIndex() {
        $this->render("//receipt/Index");       
    }
    public function actionReceiptShow() { 
        $this->renderPartial("//receipt/Show");      
    }
    public function actionReceipt($id) {
        if($id==0){
            $Formats = Format::model()->findAll();
        }else{
            $Formats = Format::model()->findAllByAttributes(array('term'=>$id));
        }
        $Moneys = Money::model()->findAll();
        $Typemoneys = Typemoney::model()->findAll();
        $this->renderPartial("//receipt/list_show",array('Typemoneys'=>$Typemoneys,'Moneys'=>$Moneys,'Formats'=>$Formats));   
    }  
    
    public function actionShowListReceipt($id){
        if(!empty($id)){
            $Formatadd = Format::model()->findByPk($id);
            $Typemoneys = Typemoney::model()->findByPk($Formatadd->typemoney);
            $Lists = Listdb::model()->findAllByAttributes(array('term'=>$Formatadd->term,'money'=>['5',$Typemoneys->money]),array('order'=>'money'));
            $this->renderPartial("//type/showformat",array('Lists'=>$Lists,'Formatadd'=>$Formatadd));
        }
    }
    public function actionAddReceipt($id) { 
        if(!empty($id)){
            $Formatadd = Format::model()->findByPk($id);
            $Typemoneys = Typemoney::model()->findByPk($Formatadd->typemoney);
            $Lists = Listdb::model()->findAllByAttributes(array('term'=>$Formatadd->term,'money'=>['5',$Typemoneys->money]),array('order'=>'money'));
            $this->renderPartial("//receipt/receipt",array('Lists'=>$Lists,'Formatadd'=>$Formatadd));
        }
    }
    
    public function actionSaveReceipt() {

    if  (date("H:i:s")<="15:30:00"){
    $ChackDate=date('Y-m-d');
    }else{
    $ChackDate=date('Y-m-d',strtotime("+1 day"));
    }
    //$ChackDate=date('Y-m-d',strtotime("-1 day"));
    //$ChackDate=date('Y-m-d');
    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    ); 


    $urlA="http://reg.sskru.ac.th/service/serach_by_idno.php?idno=5910403253";
    $contentsA = file_get_contents($urlA,false,stream_context_create($arrContextOptions));
    $decodeA = json_decode($contentsA, true);
    $webserviceA=0;
    $webserviceA=COUNT($decodeA);
        if(!empty(@$_POST['CITIZEN_ID']) AND $webserviceA!=0){
            $countID_Check=0;
            if(@$_POST['TY_Format_ID']=='1'){  
                        //URL webservice
                        $url="http://reg.sskru.ac.th/service/applicant_data.php?citizenid=".@$_POST['CITIZEN_ID'];
                        $contents = file_get_contents($url,false,stream_context_create($arrContextOptions));
                        $decode = json_decode($contents, true);
                        $CITIZEN_ID = $decode['CITIZEN_ID'];
                        $Stu_id = $decode['CITIZEN_ID'];
                        $STUName = $decode['PREFIX_NAME']."".$decode['STD_FNAME']."   ".$decode['STD_LNAME'];
                        $PROGRAM = $decode['PROGRAM_NAME_TH'];
                        $FAC = $decode['FAC_NAME_TH'];
                        $PRICE =0;
                        $stu_type = $decode['stu_type'];
                        $state_all=0;
                        $state=0;
 
                $urlUP="http://reg.sskru.ac.th/service/update_applicant.php?citizenid=".@$_POST['CITIZEN_ID'];
            	$contentsUP = file_get_contents($urlUP,false,stream_context_create($arrContextOptions));
            	$decodeUP = json_decode($contentsUP, true);

            }else{
                
                        if(@$_POST['TY_Format_ID']=='2'){ 
                                $url="http://reg.sskru.ac.th/service/regisandpay.php?citizenid=".@$_POST['CITIZEN_ID'];
                                //$url="http://202.29.57.15/service/get_enroll.php?citizenid=".@$_POST['CITIZEN_ID'];
            		$state=0;
                        $countID_Check=0;
                        
                        }else if(@$_POST['TY_Format_ID']=='20'){ 
                                $url="http://reg.sskru.ac.th/service/onlyregis.php?citizenid=".@$_POST['CITIZEN_ID'];
            		$state=0;
                        $countID_Check=0;
                        }else if(@$_POST['TY_Format_ID']=='3'){
                                $url="http://reg.sskru.ac.th/service/serach_by_idno.php?idno=".@$_POST['CITIZEN_ID'];
                                //$url="https://rdisskru.com/receipt/regapi_idno.php?id_no=".@$_POST['CITIZEN_ID'];
                         $state=0;   
                         $countID_Check=10;
                        }else{
                           $countID=strlen(trim(@$_POST['CITIZEN_ID']));
                            if($countID=='13'){
                                $url="http://reg.sskru.ac.th/service/test_get_enroll.php?citizenid=".@$_POST['CITIZEN_ID'];
                            }else if($countID=='10'){    
                                $countID_Check=10;
                                $url="http://reg.sskru.ac.th/service/serach_by_idno.php?idno=".@$_POST['CITIZEN_ID'];   
                                //$url="https://rdisskru.com/receipt/regapi_idno.php?id_no=".@$_POST['CITIZEN_ID'];
                            }else{
                                $url="http://reg.sskru.ac.th/service/serach_by_idno.php?idno=".@$_POST['CITIZEN_ID'];
                                //$url="https://rdisskru.com/receipt/regapi_idno.php?id_no=".@$_POST['CITIZEN_ID'];
                            }
                            $state=0;
                }
                            
                            $contents = file_get_contents($url,false,stream_context_create($arrContextOptions));
                            $decode = json_decode($contents, true);
                            $CITIZEN_ID = @$_POST['CITIZEN_ID']; 
            }

            $webC=0;
            $webC=COUNT($decode);
            $NoNull=9;
            
                
            if($webC!=0){ 
                if(@$_POST['TY_Format_ID']!=1){  
                    if($countID_Check==10){
                        $state_all=1;
                        $state=0;
                        $Stu_id = $decode['id_no'];
                        $STUName =$decode['pname'].$decode['name'];
                        $PROGRAM = $decode['PROGRAM_NAME_TH'];
                        $FAC = $decode['FAC_NAME_TH'];                               
                        $PRICE = 0;
                        $stu_type =substr($decode['id_no'],2,1);
                     } 
                    if($countID_Check==0){
                      $state_all=$decode['state'];
                      if($state!=0){ $state=$decode['state'];}else{ $state=0;}
                        $Stu_id = $decode['id'];
                        $STUName = $decode['name'];
                        $PROGRAM = $decode['program'];
                        $FAC = $decode['fac'];
                        $PRICE = $decode['price'];
                        $stu_type = $decode['type'];
                     }
                    
                     if(empty($Stu_id)){ $NoNull=11;}
                          
                }
                
                $Formatadd = Format::model()->findByPk(@$_POST['Format_ID']);
                $Typemoneys = Typemoney::model()->findByPk($Formatadd->typemoney);
                $Lists = Listdb::model()->findAllByAttributes(array('term'=>$Formatadd->term,'money'=>['5',$Typemoneys->money]),array('order'=>'money'));
        
                if(empty($PRICE)){ $PRICE=0; }
                if(@$_POST['TY_Format_ID']==4){ $PRICE=0;}
                if(@$_POST['TY_Format_ID']==5){ $PRICE=0;} 
                if(@$_POST['TY_Format_ID']==6){ $PRICE=0;} 
                if(@$_POST['TY_Format_ID']==3){ $PRICE=0;} 
                if(@$_POST['TY_Format_ID']==20){ $PRICE=0;} 
                if(@$_POST['TY_Format_ID']==2){ 
                   // if($stu_type!=1){ $PRICE=0; } //ค่าเทอมนักศึกษาเฉพาะปกติ
                    while($state_all==1)
                        {
                                $contents_all = file_get_contents($url);
                                $decode_all = json_decode($contents_all, true);
                                $state_all=$decode_all['state'];
                                $Stu_id = $decode_all['id'];                         
                        }
                }
                
                if($stu_type==1){
                    $stu_typeAdd=1 ;
                }else if($stu_type==2){
                    $stu_typeAdd=2 ;
                }else if($stu_type==3){
                        $PROGRAM = "-";
                        $FAC = "-";
                    $stu_typeAdd=3 ;
                }else if($stu_type==4){
                        $PROGRAM = "-";
                        $FAC = "-";
                    $stu_typeAdd=4 ;                    
                }else if($stu_type==5){
                    $stu_typeAdd=5 ;
                        $PROGRAM = "-";
                        $FAC = "-";                    
                }else{ 
                        $PROGRAM = "-";
                        $FAC = "-";                    
                    $stu_typeAdd=6 ; 
                }
                
                if($NoNull==9){
                    $Receipt_n= Receipt_num::model()->findByAttributes(array('term'=>$Formatadd->term,'ty_format'=>$Typemoneys->id),array('order'=>'id DESC'));
                        if(!isset($Receipt_n)){
                            $Receipt_num = new Receipt_num();
                            $Receipt_num->term = $Formatadd->term ;
                            $Receipt_num->book = 1; 
                            $Receipt_num->num = 0; 
                            $Receipt_num->ty_format =$Typemoneys->id;
                            $Receipt_num->save();
                        }

                    $Receipt_nums= Receipt_num::model()->findByAttributes(array('term'=>$Formatadd->term,'ty_format'=>$Typemoneys->id),array('order'=>'id DESC'));
                        $AutoNum = $Receipt_nums->num+1;
                            $Receipt_nums = new Receipt_num();
                            $Receipt_nums->term = $Formatadd->term ;

                            if($AutoNum>100){
                            $Receipt_nums->book = $Receipt_n->book+1; 
                            $numbook=$Receipt_n->book+1; 
                            $Receipt_nums->num = 1; 
                            $AutoNum=1;
                            }else{
                            $Receipt_nums->book = $Receipt_n->book; 
                            $numbook=$Receipt_n->book;
                            $Receipt_nums->num = $AutoNum; 
                            }
                            $Receipt_nums->ty_format =$Receipt_n->ty_format;
                            $Receipt_nums->save(); 

                        $Formatadd->status = 1;
                        $Formatadd->save();
                    
                        $price_sum = $PRICE+@$_POST['sumS'];


                    

                    //$Receipt_ID=$Formatadd->term."-".str_pad(@$_POST['TY_Format_ID'],2,0,STR_PAD_LEFT)."-".str_pad($AutoNum,6,0,STR_PAD_LEFT);
                    $Receipt_ID=$Formatadd->term."-".str_pad($Typemoneys->id,2,0,STR_PAD_LEFT)."-".str_pad($numbook,5,0,STR_PAD_LEFT)."-".str_pad($AutoNum,2,0,STR_PAD_LEFT);
                    //$Receipts_Ch = Receipt::model()->findByAttributes(array('Receipt_ID'=>$Receipt_ID));

                    //Fine Data 
                        if(@$_POST['Fine']!=0 OR @$_POST['Fee']!=0){ 
                            $Fines = new Fine();
                            $Fines->Receipt_ID = $Receipt_ID;
                            $Fines->Format_ID = @$_POST['Format_ID'];
                            $Fines->Fine_money = @$_POST['Fine'];
                            $Fines->Fine_fee = @$_POST['Fee'];

                            $price_sum = $price_sum+@$_POST['Fine']+@$_POST['Fee'] ;

                            $Fines->save();
                        }
                    
                    //Receipt Data
                            $Receipts = new Receipt();

                              $Receipts->CITIZEN_ID = $CITIZEN_ID;
                              $Receipts->STU_ID = $Stu_id;
                              $Receipts->STUName = $STUName;
                              $Receipts->PRICE = $PRICE;
                              $Receipts->STU_TYPE = $stu_type;
                              $Receipts->Format_ID = @$_POST['Format_ID'];
                              $Receipts->PRICE_SUM = $price_sum;
                              $Receipts->User_ID = @$_POST['User_ID'];
                              $Receipts->ChackDate = $ChackDate;
                              $Receipts->STATUS = 9 ;
                            $Receipts->Receipt_ID = $Receipt_ID;
                            $Receipts->save();
                   


                    $this->renderPartial("//receipt/receipt_print",array(
                        'Lists'=>$Lists,
                        'Formatadd'=>$Formatadd,
                        'TY_Format_ID'=>@$_POST['TY_Format_ID'],
                        'STUName'=>$STUName,
                        'CITIZEN_ID'=>$CITIZEN_ID,
                        'Stu_id'=>$Stu_id,
                        'PROGRAM'=>$PROGRAM,
                        'FAC'=>$FAC,
                        'PRICE'=>$PRICE,
                        'ChackDate'=>$ChackDate,
                        'stu_type'=>$stu_type,
                        'Receipt_ID'=>$Receipt_ID,
                        'price_sum'=>$price_sum,
                        'state_all'=>$state_all,
                        'Fine_post'=>@$_POST['Fine'],
                        )); 
                }else{
                    $STUName="";
                    $this->renderPartial("//receipt/receipt_print",array('STUName'=>$STUName,'Formatadd'=>@$_POST['Format_ID']));             
                }  
                
            }else{
                    $STUName="";
                    $this->renderPartial("//receipt/receipt_print",array('STUName'=>$STUName,'Formatadd'=>@$_POST['Format_ID']));             
            }
        }else{
                $STUName="";
                $this->renderPartial("//receipt/receipt_print",array('STUName'=>$STUName,'Formatadd'=>@$_POST['Format_ID']));             
        }
    } 
    
    public function actionRepuReceipt() {       
        $Users = User::model()->findAll();
        $Offices = Office::model()->findAll();
        $Statuss = Status::model()->findAll();
        $this->renderPartial('//receipt/User', array('Offices'=>$Offices,'Users'=>$Users,'Statuss'=>$Statuss,)); 
    }
    public function actionRepfReceipt($id) {
        $Users = User::model()->findAll();
        $Formats = Format::model()->findAllByAttributes(array('ty_format'=>$id));
        $this->renderPartial("//receipt/RepfReceipt",array('Formats'=>$Formats,'Users'=>$Users));   
    }
    public function actionRepFormat(){
            if(!empty(@$_POST['FormatsID'])){
            $Formatadd = Format::model()->findByPk(@$_POST['FormatsID']);
            $Typemoneys = Typemoney::model()->findByPk($Formatadd->typemoney);
            $Lists = Listdb::model()->findAllByAttributes(array('term'=>$Formatadd->term,'money'=>['5',$Typemoneys->money]),array('order'=>'money'));
            $f=@$_POST['Status'];                
            $ct= new CDbCriteria; 
            $ct->addBetweenCondition('ChackDate',@$_POST['datepicker'],@$_POST['datepicker_end']);
            
                if(@$_POST['User_id']==0){    
                     $Receipts = Receipt::model()->findAllByAttributes(array('Format_ID'=>$Formatadd->id,'STATUS'=>@$_POST['Status']),$ct);
                 }else{
                     $Receipts = Receipt::model()->findAllByAttributes(array('Format_ID'=>$Formatadd->id,'User_ID'=>@$_POST['User_id'],'STATUS'=>@$_POST['Status']),$ct);
                 }   
                 $this->renderPartial("//receipt/RepFormat",array('Receipts'=>$Receipts,'Lists'=>$Lists,'Formatadd'=>$Formatadd,'f'=>$f));
            }
    }
    public function actionFormReceipt(){
            $this->renderPartial("//receipt/FormReceipt");           
    }
    public function actionDelReceipt(){
        if(!empty(@$_POST['Receipt_ID'])){
            $Receiptd = new Receipt_del();
            $Receiptd->Receipt_ID = @$_POST['Receipt_ID'] ;
            $Receiptd->Comment = @$_POST['Comment']; 
            $Receiptd->User_ID = @$_POST['User_ID']; 
            $Receiptd->upday = date('Y-m-d');
            $Receiptd->save();
            
            $Receipts= Receipt::model()->findByAttributes(array('Receipt_ID'=>@$_POST['Receipt_ID']));
            $Receipts->STATUS = 0;
            $Receipts->save();
        }
        $this->renderPartial("//receipt/FormReceipt");
    }
    public function actionReceiptSearch() {
  
            //$Receipts= Receipt::model()->findAllByPk('2'); 
            $Receipts= Receipt::model()->findAllByAttributes(array('STUName'=>'Data'));
            $this->renderPartial("//receipt/ReceiptSearch",array('Receipts'=>$Receipts));   
            
    }
    public function actionSearchReceipt() {
             if(!empty(@$_POST['Searchid'])){
                 $criteria=new CDbCriteria;
                 $criteria->compare('STUName',@$_POST['Searchid'],true);
                 $criteria->compare('STATUS','9',true);
                $Receipts= Receipt::model()->findAll($criteria);  
             }else{
                $Receipts= Receipt::model()->findAllByAttributes(array('STUName'=>'Data'));
             }
            $this->renderPartial("//receipt/ReceiptSearch",array('Receipts'=>$Receipts));  
    }
    
    public function actionReceiptSeven() {
  
            $this->renderPartial("//receipt/ReceiptSeven");  
    }
    public function actionSevenReceipt(){
        if(!empty(@$_POST['upid'])){
      
        }
        $this->renderPartial("//receipt/ReceiptSeven");
    }    
    public function actionReceiptSevenCopp($ss) {
       
       if(!empty($ss)){ 
                 $ss2=trim($ss);
                 $criteria=new CDbCriteria;
                 $criteria->compare('Receipt_ID',$ss2,true);
                 $criteria->compare('STATUS','9',true);
                //$Receipts= Receipt::model()->findAll($criteria);
                $Receipts= Receipt::model()->findAllByAttributes(array('Receipt_ID'=>$ss2,'STATUS'=>'9'));
       $this->renderPartial("//receipt/receipt_print_c",array('Receipts'=>$Receipts)); 
       }else{
       $this->renderPartial("//receipt/ReceiptSearch");    
       }
    }
    public function actionReceiptSevenCopp2($ss) {
                $Receipts= Receipt::model()->findAllByAttributes(array('Receipt_ID'=>$ss,'STATUS'=>'9'));
       $this->render("//receipt/receipt_print_cc",array('Receipts'=>$Receipts)); 
    }    
}