<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class PreferenceForm extends Preference
{
    public $date_range;
    public $Climate;
    public $Activity;
    public $AccommodationFeature;
    public $Accessibility;
    public $AccommodationType;
    public $BoardBases;
    public $Style;
    public $Video;
    


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['date_range', 'required'] ;
        $rules[] = [['Climate','Activity','AccommodationFeature','Accessibility','AccommodationType','BoardBases','Style','Video'],'safe'];
        return $rules;
    }
    
    public function beforeSave($insert) {
        parent::beforeSave($insert);
        $this->setDates();
    }
    

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
    }
    
    public function setDates()
    {
        $dates = explode($this->date_range, "-");
        $this->departure_date = strtotime($dates[0]);
        $this->return_date = strtotime($dates[1]);
        
    }

    public static function getAccessibilitiesOptions()
    {
        return \app\modules\admin\models\Accessibility::find()->all();
    }
    
    public static function getAccommodationTypeOptions()
    {
        return \app\modules\admin\models\AccommodationType::find()->all();
    }
    
    public static function getBoardBasesOptions()
    {
        return \app\modules\admin\models\BoardBasis::find()->all();
    }
    
    public static function getClimateOptions()
    {
        return \app\modules\admin\models\Climate::find()->all();
    }
    public static function getAccommodationFeatureOptions()
    {
        return \app\modules\admin\models\AccommodationFeature::find()->all();
    }
    public static function getStyleOptions()
    {
        return \app\modules\admin\models\Style::find()->all();
    }
    public static function getActivityOptions()
    {
        return \app\modules\admin\models\Activity::find()->all();
    }
    public static function getVideoOptions()
    {
        return \app\modules\admin\models\Video::find()->all();
    }
}
