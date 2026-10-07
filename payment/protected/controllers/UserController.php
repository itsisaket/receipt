<?php
class UserController extends Controller{
    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    public function actionIndex() {
        $this->render("//user/index");        
    }

    public function actionOffice() {
        $Offices = Office::model()->findAll();
        $this->renderPartial("//user/office",array('Offices'=>$Offices));   
    }
    
    public function actionSaveOffice() {
        if(!empty($_POST['name'])){
            $id = $_POST['id'];
            if(empty($id)){
                $Office = new Office();
            }else{
                $Office = Office::model()->findByPk($id);
            }
                $Office->name = $_POST['name'];
                $Office->detail = $_POST['detail'];
                $Office->save();
            echo 'success';  
        }
    }
    
    public function actionEditOffice($id){
        if(!empty($id)){
            
            $Office = Office::model()->findByPk($id);
            echo CJSON::encode($Office);
        }
    }
    
    public function actionDeleteOffice($id){
        if(!empty($id)){
            $Users = User::model()->findByAttributes(array('office'=>$id));
        if(empty($Users)){
            Office::model()->deleteByPk($id);
            echo 'success'  ; 
        }else{
            echo 'no_success'  ;
        }
            
        }
    }
    
    public function actionTestOffice($id){
        if(!empty($id)){
        $test=Office::model()->findByPk($id);
        $this->renderPartial('//user/office',array('success'=>$test,));
        }
    }

   public function actionUser() {
    $Users = User::model()->findAll();
    $Offices = Office::model()->findAll();
    $Statuss = Status::model()->findAll();
    $this->renderPartial('//User/User', array('Offices'=>$Offices,'Users'=>$Users,'Statuss'=>$Statuss,)); 
    }
    
    public function actionSaveUser(){
        if(!empty($_POST['name'])){
            $id = $_POST['id'];
            if(empty($id)){
                $User = new User();                
                $User->username = $_POST['ulogin']; 
            }else{
                $User = User::model()->findByPk($id);
            }
            $pw = $_POST['password'];
            if(!empty($pw)){
                $User->password =$_POST['password'];
            }
                $User->name = $_POST['name'];
                $User->office = $_POST['office'];
                $User->status = $_POST['status'];
                $User->save();
            echo 'success';  
        }
    }
    
    public function actionEditUser($id){
        if(!empty($id)){
            
            $users = User::model()->findByPk($id);
            echo CJSON::encode($users);
        }
    }
    
    public function actionDeleteUser($id){
        if(!empty($id)){
            User::model()->deleteByPk($id);
        echo 'success';  
        }
    }
}
