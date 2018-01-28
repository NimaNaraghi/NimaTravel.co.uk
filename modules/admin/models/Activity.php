<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Image\Point;
use yii\helpers\Html;
use yii\helpers\Url;
/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string $title
 * @property string $imageFile
 */
class Activity extends \yii\db\ActiveRecord
{
    public $imageFile;
    const WIDTH = 140;
    const HEIGHT = 140;
    const PREFIX = "activity_";
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg'],
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
            $path = Yii::getAlias('@preferenceImages') . self::PREFIX . md5($this->id) . '.' . $imageFile->getExtension();

            
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
        return \yii\helpers\Url::base() . '/images/preferences/' . self::PREFIX . md5($this->id) . '.jpg';
    }


    public function deleteImage()
    {
        //find image by prefix and delete it
        $oldImages = FileHelper::findFiles(Yii::getAlias('@preferenceImages'), [
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
            'title' => Yii::t('app', 'Title'),
        ];
    }
}
