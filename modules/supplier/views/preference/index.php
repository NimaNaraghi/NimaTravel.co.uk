<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PreferenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Preferences');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preference-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'user_id',
                'content' => function($data){
                    return $data->user->username;
                }
            ],
            'created_at:datetime',
//            'updated_at',
//            'departure_date:date',
//            'return_date:date',
//            'max_budget:currency',
//            'adults',
//            'children',
//            'departure_location',
            //'favourite_destinations:ntext',
            //'comment:ntext',
            //'status',
            [
                'label' => 'Climate',
                'content' => function($model){
                    $result = "";
                    foreach($model->climates as $climate)
                    {
                        $result .= $climate->title . ", ";
                    }
                    return $result;
                }
            ],
            
            [
                'label' => 'Style',
                'value' => function($model){
                    $result = "";
                    foreach($model->styles as $style)
                    {
                        $result .= $style->title . ", ";
                    }
                    return $result;
                }
            ],
            [
                'label' => 'Activity',
                'content' => function($model){
                    $result = "";
                    foreach($model->activities as $activity)
                    {
                        $result .= $activity->title . ", ";
                    }
                    return $result;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
