<?php

/**
 * This is the model class for table "receipt".
 *
 * The followings are the available columns in table 'receipt':
 * @property integer $ID
 * @property string $CITIZEN_ID
 * @property string $STU_ID
 * @property string $STUName
 * @property integer $PRICE
 * @property integer $STU_TYPE
 * @property string $Receipt_ID
 * @property integer $Format_ID
 * @property integer $PRICE_SUM
 * @property integer $User_ID
 * @property string $ChackDate
 * @property string $STATUS
 */
class ReceiptSearch extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'receipt';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PRICE, STU_TYPE, Format_ID, PRICE_SUM, User_ID', 'numerical', 'integerOnly'=>true),
			array('CITIZEN_ID, STU_ID', 'length', 'max'=>50),
			array('STUName', 'length', 'max'=>200),
			array('Receipt_ID, ChackDate', 'length', 'max'=>20),
			array('STATUS', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, CITIZEN_ID, STU_ID, STUName, PRICE, STU_TYPE, Receipt_ID, Format_ID, PRICE_SUM, User_ID, ChackDate, STATUS', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'CITIZEN_ID' => 'Citizen',
			'STU_ID' => 'Stu',
			'STUName' => 'Stuname',
			'PRICE' => 'Price',
			'STU_TYPE' => 'Stu Type',
			'Receipt_ID' => 'Receipt',
			'Format_ID' => 'Format',
			'PRICE_SUM' => 'Price Sum',
			'User_ID' => 'User',
			'ChackDate' => 'Chack Date',
			'STATUS' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('CITIZEN_ID',$this->CITIZEN_ID,true);
		$criteria->compare('STU_ID',$this->STU_ID,true);
		$criteria->compare('STUName',$this->STUName,true);
		$criteria->compare('PRICE',$this->PRICE);
		$criteria->compare('STU_TYPE',$this->STU_TYPE);
		$criteria->compare('Receipt_ID',$this->Receipt_ID,true);
		$criteria->compare('Format_ID',$this->Format_ID);
		$criteria->compare('PRICE_SUM',$this->PRICE_SUM);
		$criteria->compare('User_ID',$this->User_ID);
		$criteria->compare('ChackDate',$this->ChackDate,true);
		$criteria->compare('STATUS',$this->STATUS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ReceiptSearch the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
