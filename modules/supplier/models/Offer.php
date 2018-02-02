<?php

namespace app\modules\supplier\models;

use Yii;
use app\modules\admin\models\BoardBasis;
use app\models\User;
/**
 * This is the model class for table "offer".
 *
 * @property int $id
 * @property int $user_id
 * @property int $board_basis_id
 * @property string $title
 * @property string $price
 * @property string $location
 * @property double $longitude
 * @property double $latitude
 * @property int $departure_date
 * @property int $return_date
 * @property string $transfer
 * @property string $return_transfer
 * @property string $luggage_allowance
 * @property string $out_link
 * @property int $created_at
 * @property int $status
 *
 * @property BoardBasis $boardBasis
 * @property User $user
 * @property OfferImage[] $offerImages
 * @property Room[] $rooms
 * @property ThingsToDo[] $thingsToDos
 */
class Offer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'price', 'departure_date', 'return_date'], 'required'],
            [['user_id', 'board_basis_id', 'departure_date', 'return_date', 'created_at', 'status'], 'integer'],
            [['price', 'longitude', 'latitude'], 'number'],
            [['title', 'location', 'transfer', 'return_transfer', 'luggage_allowance', 'out_link'], 'string', 'max' => 255],
            [['board_basis_id'], 'exist', 'skipOnError' => true, 'targetClass' => BoardBasis::className(), 'targetAttribute' => ['board_basis_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'board_basis_id' => Yii::t('app', 'Board Basis ID'),
            'title' => Yii::t('app', 'Title'),
            'price' => Yii::t('app', 'Price'),
            'location' => Yii::t('app', 'Location'),
            'longitude' => Yii::t('app', 'Longitude'),
            'latitude' => Yii::t('app', 'Latitude'),
            'departure_date' => Yii::t('app', 'Departure Date'),
            'return_date' => Yii::t('app', 'Return Date'),
            'transfer' => Yii::t('app', 'Transfer'),
            'return_transfer' => Yii::t('app', 'Return Transfer'),
            'luggage_allowance' => Yii::t('app', 'Luggage Allowance'),
            'out_link' => Yii::t('app', 'Out Link'),
            'created_at' => Yii::t('app', 'Created At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoardBasis()
    {
        return $this->hasOne(BoardBasis::className(), ['id' => 'board_basis_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfferImages()
    {
        return $this->hasMany(OfferImage::className(), ['offer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['offer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThingsToDos()
    {
        return $this->hasMany(ThingsToDo::className(), ['offer_id' => 'id']);
    }
}
