<?php

namespace app\modules\supplier\models;

use Yii;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Image\Point;
use yii\helpers\Html;
use yii\helpers\Url;
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
    public $imageFile;
    const WIDTH = 730;
    const HEIGHT = 332;
    const PREFIX = "things_";
    
    public $date_range;
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
            ['date_range', 'validateDateRange','skipOnEmpty' => false],
            [['title'], 'required'],
            //[['begin_date', 'end_date'], 'integer'],
            [['highlights', 'description'], 'string'],
            [['price'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg'],
            //[['offer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Offer::className(), 'targetAttribute' => ['offer_id' => 'id']],
        ];
    }
    
    
    
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        //create a new image considering each prefix
        
        $imageFile = $this->imageFile;
        if(!empty($imageFile)){
            // open image
            $imageFileOpened = Image::getImagine()->open($imageFile->tempName);
            //delete old images
            $this->deleteImage();

            //saving resized image
            $path = Yii::getAlias('@things') . self::PREFIX . md5($this->id) . '.' . $imageFile->getExtension();

            
            $quality = 100;
            
            $imageFileOpened->thumbnail(new Box(self::WIDTH, self::HEIGHT),
             \Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND)
            ->save($path, ['quality' => $quality]);

        }
        
        
    }
    
    public function afterDelete()
    {
        parent::afterDelete();
        $this->deleteImage();

    }
    
    public function getImageURL()
    {
        return \yii\helpers\Url::base() . '/images/things/' . self::PREFIX . md5($this->id) . '.jpg';
    }


    public function deleteImage()
    {
        //find image by prefix and delete it
        $oldImages = FileHelper::findFiles(Yii::getAlias('@things'), [
            'only' => [
                self::PREFIX . md5($this->id) . '.*',
            ], 
        ]);
        for ($i = 0; $i != count($oldImages); $i++) {
            @unlink($oldImages[$i]);
        }

    }
    
    public function validateDateRange($attribute, $params)
    {
        
        if(empty($this->end_date) or empty($this->begin_date)){
            
            $this->addError($attribute, Yii::t('app', 'Date Range cannot be blank.'));
            
        }
        
    }
    
    public function setDates()
    {
        $dates = explode(" - ", $this->date_range);
        
        $this->begin_date = strtotime($dates[0]);
        $this->end_date = strtotime($dates[1]);
        
    }
    
    public function setDateRange()
    {
        $this->date_range = date('Y-m-d', $this->begin_date) . " - " . date('Y-m-d', $this->end_date);
    }
    
    public function setReadableDateRange()
    {
        $this->begin_date = date('Y-m-d', $this->begin_date);
        $this->end_date = date('Y-m-d', $this->end_date);
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivityThingsToDos()
    {
        return $this->hasMany(ActivityThingsToDo::className(), ['things_to_do_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['id' => 'activity_id'])->viaTable('activity_things_to_do', ['things_to_do_id' => 'id']);
    }

}
