<?php

namespace app\modules\supplier\models;

use Yii;
use app\modules\admin\models\BoardBasis;
use app\models\User;
use app\models\Preference;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "offer".
 *
 * @property int $id
 * @property int $user_id
 * @property int $board_basis_id
 * @property int $preference_id
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
 * @property int $updated_at
 * @property int $status
 * @property string $description
 *
 * @property BoardBasis $boardBasis
 * @property User $user
 * @property OfferImage[] $offerImages
 * @property Room[] $rooms
 * @property ThingsToDo[] $thingsToDos
 */
class Offer extends \yii\db\ActiveRecord
{
    public $date_range;
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
            ['date_range', 'validateDateRange','skipOnEmpty' => false],
            [['title', 'price', 'departure_date', 'return_date'], 'required'],
            [['board_basis_id', 'departure_date', 'return_date', 'created_at', 'status'], 'integer'],
            [['price', 'longitude', 'latitude'], 'number'],
            [['title', 'location', 'transfer', 'return_transfer', 'luggage_allowance', 'out_link'], 'string', 'max' => 255],
            ['description','string'],
            //[['board_basis_id'], 'exist', 'skipOnError' => true, 'targetClass' => BoardBasis::className(), 'targetAttribute' => ['board_basis_id' => 'id']],
            //[['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }
    
    public function validateDateRange($attribute, $params)
    {
        
        if(empty($this->return_date) or empty($this->departure_date)){
            
            $this->addError($attribute, Yii::t('app', 'Date Range cannot be blank.'));
            
        }
        
    }
    
    public function setDates()
    {
        $dates = explode(" - ", $this->date_range);
        
        $this->departure_date = strtotime($dates[0]);
        $this->return_date = strtotime($dates[1]);
        
    }
    
    public function setDateRange()
    {
        $this->date_range = date('Y-m-d', $this->departure_date) . " - " . date('Y-m-d', $this->return_date);
    }
    
    public function setReadableDateRange()
    {
        $this->departure_date = date('Y-m-d', $this->departure_date);
        $this->return_date = date('Y-m-d', $this->return_date);
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
            'description' => Yii::t('app', 'Description'),
        ];
    }
    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'user_id',
                'updatedByAttribute' => false,
            ],
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
    public function getPreference()
    {
        return $this->hasOne(Preference::className(), ['id' => 'preference_id']);
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
    
    public function getMainImageURL()
    {
        $images = $this->offerImages;
        if(isset($images[0])){
            $mainImage = $images[0];
            return $mainImage->getImageURL();
        }else{
            return null;
        }
    }
}
