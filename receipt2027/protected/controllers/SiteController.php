<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		ob_start();
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render("index"); 
       }
	public function actionHome()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->renderPartial("index"); 
       }                

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->renderPartial('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		ob_start();
		ob_flush();
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		ob_start();
		ob_flush();
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        public function actionTest()
	{
		$this->render("//site/index"); 
	}
        public function actionDorm()
        {
$criteria = new CDbCriteria;

$criteria->addBetweenCondition('ChackDate','2015-12-15','2016-05-30');
            $DormWoman = Receipt::model()->findAllByAttributes(array('Format_ID'=>'13','STATUS'=>'9'),$criteria);
            $DormMan = Receipt::model()->findAllByAttributes(array('Format_ID'=>'12','STATUS'=>'9'),$criteria);
            $DormNew = Receipt::model()->findAllByAttributes(array('Format_ID'=>'14','STATUS'=>'9'),$criteria);
$criteriaAll = new CDbCriteria();          
$criteriaAll->condition="Format_ID=12 or Format_ID=13 or Format_ID=14";
$criteriaAll->addBetweenCondition('ChackDate','2015-12-15','2016-05-30');

            $DormAll = Receipt::model()->findAllByAttributes(array('STATUS'=>'9'),$criteriaAll);
            $dataProviderNew = new CActiveDataProvider('Receipt',array(
                'criteria' =>array('condition'=>'(Format_ID=12 or Format_ID=13 or Format_ID=14) and (ChackDate BETWEEN "2015-12-15" and "2016-08-31") and STATUS=9'
                    ),
                'pagination'=>array(
                    'pageSize'=>10,
                    ),
                ));            
            $this->render("//site/dorm",array(
                'DormWoman'=>$DormWoman,
                'DormMan'=>$DormMan,
                'DormNew'=>$DormNew,
                'DormAll'=>$DormAll,
                'dataProviderNew'=>$dataProviderNew,
                    )); 
        }

}