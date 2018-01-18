<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "accessibility".
 *
 * @property int $id
 * @property string $title
 *
 * @property PreferenceAccessibility[] $preferenceAccessibilities
 */
class Accessibility extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accessibility';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreferenceAccessibilities()
    {
        return $this->hasMany(PreferenceAccessibility::className(), ['accessibility_id' => 'id']);
    }
    
    
}
