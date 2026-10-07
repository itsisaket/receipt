<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
            /*
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
           */     
                $username = strtolower($this->username); 
     
                // $this->username; username คือ ชื่อ Textbox ในฟอร์ม Login
                $user = User::model()->findByAttributes(array('username' => $username));
     
                // User ชื่อ Model ที่เราสร้างไว้
                if(!isset($user)){ // === NULL
                    $this->errorCode = self::ERROR_USERNAME_INVALID;
                }else if(!$user->validatePassword($this->password)){ // !== Password
                    $this->errorCode = self::ERROR_PASSWORD_INVALID;
                }else{          
                    $this->username = $user->name;
                    $this->setState('User_id', $user->id);
                    $this->setState('User_office', $user->office);
                    $this->setState('User_status', $user->status);
                // $user->name; name ชื่อ Field :: name ในตาราง user
                    $this->errorCode = self::ERROR_NONE;
                }
     
                return $this->errorCode == self::ERROR_NONE;
	}
}