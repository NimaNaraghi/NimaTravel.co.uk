<?php

namespace app\models;

use Yii;
use app\modules\admin\models\Accessibility;
use app\modules\admin\models\Climate;
use app\modules\admin\models\AccommodationFeature;
use app\modules\admin\models\AccommodationType;
use app\modules\admin\models\Style;
use app\modules\admin\models\Activity;
use app\modules\admin\models\Video;
use app\modules\admin\models\BoardBasis;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "preference".
 *
 * @property int $id
 * @property int $user_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $departure_date
 * @property int $return_date
 * @property string $max_budget
 * @property int $adults
 * @property int $children
 * @property string $departure_location
 * @property string $favourite_destinations
 * @property string $comment
 * @property int $status
 *
 * @property User $user
 * @property PreferenceAccessibility[] $preferenceAccessibilities
 * @property Accessibility[] $accessibilities
 * @property PreferenceAccommodationFeature[] $preferenceAccommodationFeatures
 * @property AccommodationFeature[] $accommodationFeatures
 * @property PreferenceAccommodationType[] $preferenceAccommodationTypes
 * @property AccommodationType[] $accommodationTypes
 * @property PreferenceActivity[] $preferenceActivities
 * @property Activity[] $activities
 * @property PreferenceBoardBasis[] $preferenceBoardBases
 * @property BoardBasis[] $boardBases
 * @property PreferenceClimate[] $preferenceClimates
 * @property Climate[] $climates
 * @property PreferenceStyle[] $preferenceStyles
 * @property Style[] $styles
 * @property PreferenceVideo[] $preferenceVideos
 * @property Video[] $videos
 */
class Preference extends \yii\db\ActiveRecord
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
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'preference';
    }
    


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            ['date_range', 'validateDateRange','skipOnEmpty' => false],
            ['adults','validateDateRange'],
            [['adults', 'children', 'status','departure_date','return_date'], 'integer'],
            [['max_budget'], 'number'],
            [['favourite_destinations', 'comment'], 'string'],
            [['departure_location'], 'string', 'max' => 255],
            [['Climate','Activity','Accessibility','AccommodationFeature','AccommodationType','Style','BoardBases','Video'],'safe']
//            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            
        ];
    }
    
    public function validateDateRange($attribute, $params)
    {
        
        if(empty($this->return_date) or empty($this->departure_date)){
            
            $this->addError($attribute, Yii::t('app', 'Date Range cannot be blank.'));
            
        }
        
    }
    
    
    
    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        
        $this->insertJunctionRelations($this->Climate, Climate::tableName());
        $this->insertJunctionRelations($this->Accessibility, Accessibility::tableName());
        $this->insertJunctionRelations($this->AccommodationFeature, AccommodationFeature::tableName());
        $this->insertJunctionRelations($this->AccommodationType, \app\modules\admin\models\AccommodationType::tableName());
        $this->insertJunctionRelations($this->Style, Style::tableName());
        $this->insertJunctionRelations($this->Video, Video::tableName());
        $this->insertJunctionRelations($this->Activity, Activity::tableName());
        $this->insertJunctionRelations($this->BoardBases, \app\modules\admin\models\BoardBasis::tableName());
        
    }
    
    private function insertJunctionRelations($selectList,$table)
    {
        //die(var_dump($selectList));
        $tableName = $this->getJunctionTableName($table);
        if(is_array($selectList)){
            foreach($selectList as $key => $value)
            {
                if($value){
                    Yii::$app->db->createCommand()->insert($tableName, [
                        'preference_id' => $this->id,
                        $table . '_id' => $key,
                    ])->execute();
                }
            }
        }
    }
    
    protected function getJunctionTableName($table)
    {
        return $this->tableName() . "_" . $table;
    }


    public function setDates()
    {
        $dates = explode(" - ", $this->date_range);
        if(isset($dates[0]) and isset($dates[1])){
            $this->departure_date = strtotime($dates[0]);
            $this->return_date = strtotime($dates[1]);
        }
        //die(var_dump($this->departure_date)."***".var_dump($this->return_date));
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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'departure_date' => Yii::t('app', 'Departure Date'),
            'return_date' => Yii::t('app', 'Return Date'),
            'max_budget' => Yii::t('app', 'Max Budget'),
            'adults' => Yii::t('app', 'Adults'),
            'children' => Yii::t('app', 'Children'),
            'departure_location' => Yii::t('app', 'Departure Location'),
            'favourite_destinations' => Yii::t('app', 'Favourite Destinations'),
            'comment' => Yii::t('app', 'Comment'),
            'status' => Yii::t('app', 'Status'),
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreferenceAccessibilities()
    {
        return $this->hasMany(PreferenceAccessibility::className(), ['preference_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccessibilities()
    {
        return $this->hasMany(Accessibility::className(), ['id' => 'accessibility_id'])->viaTable('preference_accessibility', ['preference_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreferenceAccommodationFeatures()
    {
        return $this->hasMany(PreferenceAccommodationFeature::className(), ['preference_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccommodationFeatures()
    {
        return $this->hasMany(AccommodationFeature::className(), ['id' => 'accommodation_feature_id'])->viaTable('preference_accommodation_feature', ['preference_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreferenceAccommodationTypes()
    {
        return $this->hasMany(PreferenceAccommodationType::className(), ['preference_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccommodationTypes()
    {
        return $this->hasMany(AccommodationType::className(), ['id' => 'accommodation_type_id'])->viaTable('preference_accommodation_type', ['preference_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreferenceActivities()
    {
        return $this->hasMany(PreferenceActivity::className(), ['preference_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(Activity::className(), ['id' => 'activity_id'])->viaTable('preference_activity', ['preference_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreferenceBoardBases()
    {
        return $this->hasMany(PreferenceBoardBasis::className(), ['preference_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoardBases()
    {
        return $this->hasMany(BoardBasis::className(), ['id' => 'board_basis_id'])->viaTable('preference_board_basis', ['preference_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreferenceClimates()
    {
        return $this->hasMany(PreferenceClimate::className(), ['preference_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClimates()
    {
        return $this->hasMany(Climate::className(), ['id' => 'climate_id'])->viaTable('preference_climate', ['preference_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreferenceStyles()
    {
        return $this->hasMany(PreferenceStyle::className(), ['preference_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStyles()
    {
        return $this->hasMany(Style::className(), ['id' => 'style_id'])->viaTable('preference_style', ['preference_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreferenceVideos()
    {
        return $this->hasMany(PreferenceVideo::className(), ['preference_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(Video::className(), ['id' => 'video_id'])->viaTable('preference_video', ['preference_id' => 'id']);
    }
    
}
