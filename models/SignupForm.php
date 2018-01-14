<?php
namespace app\models;

use app\models\User;
use app\models\Profile;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $honeypot;
    public $termsAgreement;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['username'], 'filter', 'filter' => 'trim'],
//            [['username'], 'required'],
//            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => Yii::t('app','This username has already been taken.')],
//            ['username', 'string', 'min' => 2, 'max' => 255],
            ['username', 'default', 'value' => substr(md5(time()),0,12)],
            ['termsAgreement', 'validateAgreement'],
            ['termsAgreement', 'required'],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => Yii::t('app','This email address has already been taken.')],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['username', 'string', 'min' => 6],
            
            
            ['honeypot', 'honeypotValidator']
        ];
    }
    
    public function validateAgreement($attribute, $params, $validator)
    {
        //die(var_dump($attribute));
        if ($this->$attribute != TRUE) {
            $this->addError($attribute, Yii::t('app','You must agree our term to register.'));
        }
    }
    
    public function honeypotValidator($attribute)
    {
        if(isset($this->honeypot))
            $this->addError($attribute, Yii::t('app','Please leave this field blank.'));
        
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        
        if ($this->validate()) {
            //die(print_r($this->attributes()));
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->status = User::STATUS_DELETED;

            if ($user->save()) {
                $this->createProfile($user->id);
                return $user;
            }
        }else{
            return false;
        }

        
    }
	
    private function createProfile($userID)
    {
        $profile = new Profile;
        
        $profile->user_id = $userID;
        if($profile->save() == false){
            Yii::warning('profile was not created after signup.'.print_r($profile->errors,true));
        }
    }
    
	public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'password_repeat' => Yii::t('app', 'Password Confirm'),
            'email' => Yii::t('app', 'Email'),
            'termsAgreement' => Yii::t('app','I agree with '),
        ];
    }
}
