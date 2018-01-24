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
    public $climates;
    public $activities;
    public $accommodationFeature;
    public $accessibility;
    public $accommodationType;
    public $boardBases;
    public $styles;
    public $videos;
    


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            
        ];
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
}
