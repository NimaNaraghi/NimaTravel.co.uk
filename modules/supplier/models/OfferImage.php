<?php

namespace app\modules\supplier\models;

use Yii;

/**
 * This is the model class for table "offer_image".
 *
 * @property int $id
 * @property int $offer_id
 * @property string $title
 *
 * @property Offer $offer
 */
class OfferImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offer_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['offer_id'], 'required'],
            [['offer_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['offer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Offer::className(), 'targetAttribute' => ['offer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'offer_id' => Yii::t('app', 'Offer ID'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffer()
    {
        return $this->hasOne(Offer::className(), ['id' => 'offer_id']);
    }
}
