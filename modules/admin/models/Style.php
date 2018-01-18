<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "style".
 *
 * @property int $id
 * @property string $title
 *
 * @property PreferenceStyle[] $preferenceStyles
 */
class Style extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'style';
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
    public function getPreferenceStyles()
    {
        return $this->hasMany(PreferenceStyle::className(), ['style_id' => 'id']);
    }
}
