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
    public $imageFile;
    const WIDTH = 730;
    const HEIGHT = 332;
    const PREFIX = "offer_image_";
    
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
            
            [['title'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg'],
            //[['offer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Offer::className(), 'targetAttribute' => ['offer_id' => 'id']],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
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
            $path = Yii::getAlias('@offerImages') . self::PREFIX . md5($this->id) . '.' . $imageFile->getExtension();

            
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
        return \yii\helpers\Url::base() . '/images/offers/' . self::PREFIX . md5($this->id) . '.jpg';
    }


    public function deleteImage()
    {
        //find image by prefix and delete it
        $oldImages = FileHelper::findFiles(Yii::getAlias('@offerImages'), [
            'only' => [
                self::PREFIX . md5($this->id) . '.*',
            ], 
        ]);
        for ($i = 0; $i != count($oldImages); $i++) {
            @unlink($oldImages[$i]);
        }

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
