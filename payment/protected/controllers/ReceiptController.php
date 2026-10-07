<?php
class ReceiptController extends Controller{
    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    public function actionIndex() {
        $this->render("//receipt/index");        
    }

    public function actionReceipt() {
        $Formats = Format::model()->findAll();
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
//$ChackDate=date('Y-m-d');

$urlA="http://regis.sskru.ac.th/json/get_student_by_id.php?idno=5821423005";
$contentsA = file_get_contents($urlA);
$decodeA = json_decode($contentsA, true);
$webservice='0';
if($decodeA['idno']=='5821423005'){ $webservice='5821423005';}
if(!empty($_POST['CITIZEN_ID']) AND $webservice=='5821423005'){

            $countID_Check=0;
            $Formatadd = Format::model()->findByPk($_POST['Format_ID']);
            $Typemoneys = Typemoney::model()->findByPk($Formatadd->typemoney);
            $Lists = Listdb::model()->findAllByAttributes(array('term'=>$Formatadd->term,'money'=>['5',$Typemoneys->money]),array('order'=>'money'));
                if($_POST['TY_Format_ID']==1){  //����Ѻ��Ѥ�
                        //URL webservice
                        $url="http://regis.sskru.ac.th/json/applicant_data.php?citizenid=".$_POST['CITIZEN_ID'];
                        $contents = file_get_contents($url);
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

		//�Ѿഷ�����š����Ѥ�         
		$urlUP="http://regis.sskru.ac.th/json/Update_applicant.php?citizenid=".$_POST['CITIZEN_ID'];
            	$contentsUP = file_get_contents($urlUP);
            	$decodeUP = json_decode($contentsUP, true);

                }else{

                        if($_POST['TY_Format_ID']==2){ //��§ҹ���
                        //�����ʹѡ�֡��   
			$url="http://regis.sskru.ac.th/json/get_enroll.php?citizenid=".$_POST['CITIZEN_ID'];
                        //$url="http://regis.sskru.ac.th/json/test_get_enroll.php?citizenid=".$_POST['CITIZEN_ID'];
            		$state=0;

                        }else if($_POST['TY_Format_ID']==3){
                            $url="http://regis.sskru.ac.th/json/test_get_enroll.php?citizenid=".$_POST['CITIZEN_ID'];
                            
                        }else if($_POST['TY_Format_ID']==4){
                            $countID=strlen($_POST['CITIZEN_ID']);
                            if($countID==13){
                                $url="http://regis.sskru.ac.th/json/test_get_enroll.php?citizenid=".$_POST['CITIZEN_ID'];
                            }else if($countID==10){
                                $countID_Check=10;
                                $url="http://regis.sskru.ac.th/json/get_student_by_id.php?idno=".$_POST['CITIZEN_ID'];
                            }
                            
                        }
                            
                            $contents = file_get_contents($url);
                            $decode = json_decode($contents, true);
                            $CITIZEN_ID = $_POST['CITIZEN_ID'];
                                if($countID_Check==0){
                                  $state_all=$decode['state'];
                                  if($state!=0){ $state=$decode['state'];}
                                    $Stu_id = $decode['id'];
                                    $STUName = $decode['name'];
                                    $PROGRAM = $decode['program'];
                                    $FAC = $decode['fac'];
                                    $PRICE = $decode['price'];
                                    $stu_type = $decode['type'];
                                 }
                                if($countID_Check==10){
                                    $state_all=1;
                                    $state=0;
                                    $Stu_id = $decode['idno'];
                                    $STUName = $decode['pname'].$decode['name'];
                                    $PROGRAM = "-";
                                    $FAC = "-";
                                    $PRICE = 0;
                                    $stu_type = substr($decode['idno'],2,1);
                                 }                                 
                        if($state==1){
                            $STUName="";
                        }   
                }
            if(empty($PRICE)){ $PRICE=0; }
            if($stu_type!=1){ $PRICE=0; }
            if($_POST['TY_Format_ID']==4){ $PRICE=0; }
	    if($_POST['TY_Format_ID']==2){ 
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
                    $stu_typeAdd=4 ;
                }else if($stu_type==4 Or $stu_type==5){
                    $stu_typeAdd=3 ;
                }else{ $stu_typeAdd=5 ; }

            if((!empty($STUName) and !empty($PROGRAM))and $stu_typeAdd == $_POST['Money_ID']){
                
                $Receipt_n= Receipt_num::model()->findByAttributes(array('term'=>$Formatadd->term));
                    if(!isset($Receipt_n)){
                        $Receipt_num = new Receipt_num();
                        $Receipt_num->term = $Formatadd->term ;
                        $Receipt_num->num = 0; 
                        $Receipt_num->save();
                    }
                $Receipt_nums= Receipt_num::model()->findByAttributes(array('term'=>$Formatadd->term));
                $AutoNum = $Receipt_nums->num + 1;
                    $Receipt_nums->num = $AutoNum;
                    $Receipt_nums->save();
                
                    $Formatadd->status = 1;
                    $Formatadd->save();
                    
                $price_sum = $PRICE+$_POST['sumS'];
                    
                $Receipt_ID=$Formatadd->term."-".str_pad($_POST['TY_Format_ID'],2,0,STR_PAD_LEFT)."-".str_pad($AutoNum,6,0,STR_PAD_LEFT);
                          
                        $Receipts = new Receipt();
                          
                          $Receipts->CITIZEN_ID = $CITIZEN_ID;
                          $Receipts->STU_ID = $Stu_id;
                          $Receipts->STUName = $STUName;
                          $Receipts->PRICE = $PRICE;
                          $Receipts->STU_TYPE = $stu_type;
                          $Receipts->Format_ID = $_POST['Format_ID'];
                          $Receipts->PRICE_SUM = $price_sum;
                          $Receipts->User_ID = $_POST['User_ID'];
                          $Receipts->ChackDate = $ChackDate;
                          $Receipts->STATUS = 9 ;
			
			  
            		 $Receipts_Ch = Receipt::model()->findByAttributes(array('Receipt_ID'=>$Receipt_ID));
			 while(isset($Receipts_Ch->ID)){
				$Receipt_nums= Receipt_num::model()->findByAttributes(array('term'=>$Formatadd->term));
                		$AutoNum = $Receipt_nums->num + 1;
                    		$Receipt_nums->num = $AutoNum;
				$Receipt_nums->save();
					$Receipt_ID=$Formatadd->term."-".str_pad($_POST['TY_Format_ID'],2,0,STR_PAD_LEFT)."-".str_pad($AutoNum,6,0,STR_PAD_LEFT);
					$Receipts_Ch = Receipt::model()->findByAttributes(array('Receipt_ID'=>$Receipt_ID));
				}

			$Receipts->Receipt_ID = $Receipt_ID;
			$Receipts->save();

                
                $this->renderPartial("//receipt/receipt_print",array(
                    'Lists'=>$Lists,
                    'Formatadd'=>$Formatadd,
                    'TY_Format_ID'=>$_POST['TY_Format_ID'],
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
                    )); 
            }else{
                $STUName="";
                $this->renderPartial("//receipt/receipt_print",array('Lists'=>$Lists,'Formatadd'=>$Formatadd,'TY_Format_ID'=>$_POST['TY_Format_ID'],'STUName'=>$STUName)); 
            }
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
            if(!empty($_POST['FormatsID'])){
            $Formatadd = Format::model()->findByPk($_POST['FormatsID']);
            $Typemoneys = Typemoney::model()->findByPk($Formatadd->typemoney);
            $Lists = Listdb::model()->findAllByAttributes(array('term'=>$Formatadd->term,'money'=>['5',$Typemoneys->money]),array('order'=>'money'));
            $f=$_POST['Status'];
            if($_POST['User_id']==0){
                     $Receipts = Receipt::model()->findAllByAttributes(array('ChackDate'=>$_POST['datepicker'],'Format_ID'=>$Formatadd->id,'STATUS'=>$_POST['Status']));
                 }else{
                     $Receipts = Receipt::model()->findAllByAttributes(array('ChackDate'=>$_POST['datepicker'],'Format_ID'=>$Formatadd->id,'User_ID'=>$_POST['User_id'],'STATUS'=>$_POST['Status']));
                 }            
                 $this->renderPartial("//receipt/RepFormat",array('Receipts'=>$Receipts,'Lists'=>$Lists,'Formatadd'=>$Formatadd,'f'=>$f));
            }
    }
    public function actionFormReceipt(){
            $this->renderPartial("//receipt/FormReceipt");           
    }
    public function actionDelReceipt(){
        if(!empty($_POST['Receipt_ID'])){
            $Receiptd = new Receipt_del();
            $Receiptd->Receipt_ID = $_POST['Receipt_ID'] ;
            $Receiptd->Comment = $_POST['Comment']; 
            $Receiptd->User_ID = $_POST['User_ID']; 
            $Receiptd->upday = date('Y-m-d');
            $Receiptd->save();
            
            $Receipts= Receipt::model()->findByAttributes(array('Receipt_ID'=>$_POST['Receipt_ID']));
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
             if(!empty($_POST['Searchid'])){
                 $criteria=new CDbCriteria;
                 $criteria->compare('STUName',$_POST['Searchid'],true);
                 $criteria->compare('STATUS','9',true);
                $Receipts= Receipt::model()->findAll($criteria);  
             }else{
                $Receipts= Receipt::model()->findAllByAttributes(array('STUName'=>'Data'));
             }
            $this->renderPartial("//receipt/ReceiptSearch",array('Receipts'=>$Receipts));  
    }
}