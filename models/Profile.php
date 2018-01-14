<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $city
 * @property string $country
 * @property string $address
 */
class Profile extends \yii\db\ActiveRecord
{
    
    public $honeypot;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['user_id'], 'integer'],
            [['first_name', 'last_name', 'phone', 'city', 'country'], 'string', 'max' => 255],
            ['address', 'string'],
            ['honeypot', 'honeypotValidator'],
        ];
    }
    
    public function honeypotValidator($attribute)
    {
        if(isset($this->honeypot))
            $this->addError($attribute, Yii::t('app','Please leave this field blank.'));
        
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'phone' => Yii::t('app', 'Phone'),
            'city' => Yii::t('app', 'City'),
            'country' => Yii::t('app', 'Country'),
            'address' => Yii::t('app', 'Address'),
        ];
    }
    
}
