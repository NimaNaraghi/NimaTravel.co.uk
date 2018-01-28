<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property string $title
 * @property string $link
 *
 * @property PreferenceVideo[] $preferenceVideos
 * @property Preference[] $preferences
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'link'], 'required'],
            [['title', 'link'], 'string', 'max' => 255],
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
            'link' => Yii::t('app', 'Link'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreferenceVideos()
    {
        return $this->hasMany(PreferenceVideo::className(), ['video_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreferences()
    {
        return $this->hasMany(Preference::className(), ['id' => 'preference_id'])->viaTable('preference_video', ['video_id' => 'id']);
    }
}
