<?php
namespace app\models;

use app\models\User;
use yii\base\Model;
use Yii;
/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;
    
    public $honeypot;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => 'app\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => Yii::t('app','There is no user with such email.')
            ],
            ['honeypot', 'honeypotValidator']
        ];
    }
    
    public function honeypotValidator($attribute)
    {
        if(isset($this->honeypot))
            $this->addError($attribute, Yii::t('tri','Please leave this field blank.'));
        
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if ($user) {
            if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
                $user->generatePasswordResetToken();
            }

            if ($user->save()) {
                return \Yii::$app->mailer->compose(['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'], ['user' => $user])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name])
                    ->setTo($this->email)
                    ->setSubject(Yii::t('app','Password reset for ') . \Yii::$app->name)
                    ->send();
            }
        }

        return false;
    }
	
	public function attributeLabels()
    {
        return [
            'email' => Yii::t('app', 'Email'),
            
        ];
    }
}
