<?php
namespace app\commands;

use yii\console\Controller;
use app\models\Preference;
class PgenController extends Controller
{
    
    public function actionIndex()
    {
        
        foreach(Preference::getClimateOptions() as $climate)
        {
            
                foreach(Preference::getStyleOptions() as $style)
                {
                    foreach(Preference::getActivityOptions() as $activity)
                    {
                        $climateArray[$climate->id] = 1;
                        $styleArray[$style->id] = 1;
                        $activityArray[$activity->id] = 1;
                        
                        $model = new Preference();
                        
                        $model->Climate = $climateArray;
                        $model->Style = $styleArray;
                        $model->Activity = $activityArray;
                        $model->date_range = "2018-02-23 - 2018-02-24";
                        $model->user_id = 6;
                        $model->setDates();
                        //die(print_r($model->Climate));
                        
                        $climateArray = [];
                        $styleArray = [];
                        $activityArray = [];
                        
                        if(!$model->save()){
                            print_r($model->errors);
                        }
                    }
                }
            
        }
    }
    
    public function actionClear()
    {
        $models = Preference::find()->all();
        foreach($models as $model)
        {
            $model->delete();
        }
    }
}
