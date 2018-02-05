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

//            'id',
            [
                'attribute' => 'user_id',
                'content' => function($data){
                    return $data->user->username;
                }
            ],
            'created_at:datetime',
//            'updated_at',
            'departure_date:date',
            'return_date:date',
            'max_budget:currency',
            'adults',
            'children',
            'departure_location',
            //'favourite_destinations:ntext',
            //'comment:ntext',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
