<?php
class TypeController extends Controller{
    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    public function actionIndex() {
        $this->render("//type/index");        
    }

    public function actionType() {
        $Moneys = Money::model()->findAll();
        $Types = Typemoney::model()->findAll();
        $this->renderPartial("//type/type",array('Types'=>$Types,'Moneys'=>$Moneys,));   
    }
    
    public function actionSaveType() {
        if(!empty($_POST['term'])){
            $id = $_POST['id'];
            if(empty($id)){
                $Typemoney = new Typemoney();
            }else{
                $Typemoney = Typemoney::model()->findByPk($id);
            }
                $Typemoney->term = $_POST['term'];
                $Typemoney->money = $_POST['money'];
                $Typemoney->submoney = $_POST['submoney'];
                $Typemoney->save();
            echo 'success';  
        }
    }
    
    public function actionEditType($id){
        if(!empty($id)){
            
            $Typemoney = Typemoney::model()->findByPk($id);
            echo CJSON::encode($Typemoney);
        }
    }
    
    public function actionDeleteType($id){
        
        if(!empty($id)){
            $lists = Listdb::model()->findByAttributes(array('typemoney'=>$id));
        if(empty($lists)){
            Typemoney::model()->deleteByPk($id);
            echo 'success'  ; 
        }else{
            echo 'no_success'  ;
        }
            
        }        
    }
    
    public function actionList() {
        $Lists = Listdb::model()->findAll(array('order'=>'term','order'=>'money'));
        $Moneys = Money::model()->findAll();
        $Typemoneys = Typemoney::model()->findAll();
        $this->renderPartial("//type/List",array('Typemoneys'=>$Typemoneys,'Moneys'=>$Moneys,'Lists'=>$Lists));   
    }
    public function actionSaveList() {
        if(!empty($_POST['term'])){
            $id = $_POST['id'];
            $ty = $_POST['typemoney'];
            $Typemoneys = Typemoney::model()->findByPk($_POST['typemoney']);
            if(empty($id)){
                $Lists = new Listdb();
            }else{
                $Lists = Listdb::model()->findByPk($id);
            }
                $Lists->term = $_POST['term'];
                $Lists->typemoney = $_POST['typemoney'];            
                $Lists->money = $Typemoneys->money;
                $Lists->name = $_POST['name'];
                $Lists->price = $_POST['price'];
                $Lists->save();
            echo 'success';  
        }
    }
    public function actionEditList($id){
        if(!empty($id)){
            
            $Lists = Listdb::model()->findByPk($id);
            echo CJSON::encode($Lists);
        }
    }
    
    public function actionDeleteList($id){
        if(!empty($id)){
        Listdb::model()->deleteByPk($id);
        echo 'success';  
        }
    }
    
    public function actionFormat() {
        $Formats = Format::model()->findAll(array('order'=>'term','order'=>'typemoney'));
        $Moneys = Money::model()->findAll();
        $Typemoneys = Typemoney::model()->findAll();
        $this->renderPartial("//type/Format",array('Typemoneys'=>$Typemoneys,'Moneys'=>$Moneys,'Formats'=>$Formats));   
    }
    public function actionSaveFormat() {
        if(!empty($_POST['term'])){
            $id = $_POST['id'];
            if(empty($id)){
                $Formats = new Format();
            }else{
                $Formats = Format::model()->findByPk($id);
            }
                $Formats->term = $_POST['term'];
                $Formats->termid = $_POST['termid'];
                $Formats->ty_format = $_POST['ty_format'];
                $Formats->typemoney = $_POST['typemoney'];
                $Formats->name = $_POST['name'];
                $Formats->status = 0;
                $Formats->summoney = 0;
                $Formats->save();
            echo 'success';  
        }
    }
    public function actionEditFormat($id){
        if(!empty($id)){
            
            $Formats = Format::model()->findByPk($id);
            echo CJSON::encode($Formats);
        }
    }
    public function actionDeleteFormat($id){
        if(!empty($id)){
        Format::model()->deleteByPk($id);
        echo 'success';  
        }
    }    
    public function actionTermFormat($id){
        if(!empty($id)){
            $Lists = Listdb::model()->findAllByAttributes(array('term'=>$id));
            echo CJSON::encode($Lists);
        }
    }  
    public function actionAddFormat($id){
        if(!empty($id)){
            $Formatadd = Format::model()->findByPk($id);
            $Typemoneys = Typemoney::model()->findByPk($Formatadd->typemoney);
            $Lists = Listdb::model()->findAllByAttributes(array('term'=>$Formatadd->term,'typemoney'=>$Typemoneys->id),array('order'=>'typemoney'));
            $this->renderPartial("//type/Listformat",array('Lists'=>$Lists,'Formatadd'=>$Formatadd));
        }
    }      
    public function actionSaveListformat() {
        if(!empty($_POST['formatID'])){
                $sum=0;
                Styledb::model()->deleteAllByAttributes(array('formatID'=>$_POST['formatID']));
                for ($i=0;$i<count($_POST['addList']);$i++) { 
                    $Style = new Styledb();
                    $Style->formatID = $_POST['formatID'][$i];
                    $Style->listID = $_POST['addList'][$i];
                    $Style->listPrice = $_POST['price'][$_POST['addList'][$i]];
                    $Style->save(); 
                    $sum = $sum + $_POST['price'][$_POST['addList'][$i]];
                }
                
                $Formats = Format::model()->findByPk($_POST['formatID']);
                $Formats->summoney =$sum;
                $Formats->save();
            echo 'success';  
        }
    } 
    public function actionShowFormat($id){
        if(!empty($id)){
            $Formatadd = Format::model()->findByPk($id);
            $Typemoneys = Typemoney::model()->findByPk($Formatadd->typemoney);
            $Lists = Listdb::model()->findAllByAttributes(array('term'=>$Formatadd->term,'money'=>['5',$Typemoneys->money]),array('order'=>'money'));
            $this->renderPartial("//type/showformat",array('Lists'=>$Lists,'Formatadd'=>$Formatadd));
        }
    }
}