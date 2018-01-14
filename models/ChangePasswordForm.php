<?php

namespace app\models;

use app\models\User;
use yii\base\Model;
use Yii;

class ChangePasswordForm extends Model
{
    public $currentPassword;
    public $newPassword;
    public $newPassword_repeat;
    
    private $_user;

    public $honeypot;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['currentPassword', 'newPassword', 'newPassword_repeat'], 'required'],
            ['newPassword', 'string', 'min' => 6],
            // password is validated by validatePassword()
            ['currentPassword', 'validatePassword'],
            
            // same as above but with explicitly specifying the attribute to compare with
            ['newPassword_repeat', 'compare', 'compareAttribute' => 'newPassword'],
            ['honeypot', 'honeypotValidator']
        ];
    }
    public function honeypotValidator($attribute)
    {
        if(isset($this->honeypot))
            $this->addError($attribute, Yii::t('app','Please leave this field blank.'));
        
    }
    
    public function attributeLabels()
    {
        return [
            'currentPassword' => Yii::t('app', 'Current Password'),
            'newPassword' => Yii::t('app', 'New Password'),
            'newPassword_repeat' => Yii::t('app', 'New Password Repeat'),
        ];
    }
    
    public function changePassword() 
    {
        if($this->validate()){
            $user = $this->getUser();
            $user->setPassword($this->newPassword);
            if(!$user->save()){
                return false;
            }
            return TRUE;
        }
        else{
            return null;
        }
        
        
    }
    
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->currentPassword)) {
                $this->addError($attribute, 'Incorrect current password.');
            }
        }
    }
    
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = \Yii::$app->user->identity;
        }

        return $this->_user;
    }
}

