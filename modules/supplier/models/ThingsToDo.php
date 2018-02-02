<?php

namespace app\modules\supplier\models;

use Yii;

/**
 * This is the model class for table "things_to_do".
 *
 * @property int $id
 * @property int $offer_id
 * @property string $title
 * @property string $highlights
 * @property string $description
 * @property string $price
 * @property int $begin_date
 * @property int $end_date
 *
 * @property Offer $offer
 */
class ThingsToDo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'things_to_do';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['offer_id', 'title'], 'required'],
            [['offer_id', 'begin_date', 'end_date'], 'integer'],
            [['highlights', 'description'], 'string'],
            [['price'], 'number'],
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
            'highlights' => Yii::t('app', 'Highlights'),
            'description' => Yii::t('app', 'Description'),
            'price' => Yii::t('app', 'Price'),
            'begin_date' => Yii::t('app', 'Begin Date'),
            'end_date' => Yii::t('app', 'End Date'),
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
