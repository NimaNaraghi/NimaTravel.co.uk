<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "accommodation_type".
 *
 * @property int $id
 * @property string $title
 *
 * @property PreferenceAccommodationType[] $preferenceAccommodationTypes
 */
class AccommodationType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accommodation_type';
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
    public function getPreferenceAccommodationTypes()
    {
        return $this->hasMany(PreferenceAccommodationType::className(), ['accommodation_type_id' => 'id']);
    }
}
