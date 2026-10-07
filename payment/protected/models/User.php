<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class User extends CActiveRecord{
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function tableName() {
        return 'user';
    }
    
    public function validatePassword($password) {
        return $password === $this->password;
    }
    
    public function rules()
    {
        return array(
            array('name, username, password', 'required'),
            array('name', 'length', 'max' => 200),
            array('username', 'length', 'max' => 30),
            array('password', 'length', 'max' => 30),
            array('id, name, username, password', 'safe', 'on' => 'search'),
        );
    }
 
    public function relations()
    {
        return array();
    }
 
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'username' => 'Username',
            'password' => 'Password',
        );
    }
    public function search()
    {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}

