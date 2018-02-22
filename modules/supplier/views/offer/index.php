<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\supplier\models\OfferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Offers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'preference_id',
            [
                'attribute' => 'user_id',
                'content' => function($data){
                    return $data->user->username;
                }
            ],
            [
                'attribute' => 'board_basis_id',
                'content' => function($data){
                    return $data->boardBasis->title;
                }
            ],
            
            'title',
            'price:currency',
            //'location',
            //'longitude',
            //'latitude',
            //'departure_date',
            //'return_date',
            //'transfer',
            //'return_transfer',
            //'luggage_allowance',
            //'out_link',
            //'created_at',
            //'status',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => Yii::t('app', 'delete'),
                        ],['data-method' => 'post']);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'title' => Yii::t('app', 'update'),
                        ]);
                    },
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                'title' => Yii::t('app', 'view'),
                        ]);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'delete') {
                        $url = Url::to(['offer/delete','id' => $model->id]);
                        return $url;
                    }
                    if ($action === 'view') {
                        $url = Url::to(['offer/view','id' => $model->id]);
                        return $url;
                    }
                    if ($action === 'update') {
                        $url = Url::to(['offer/update','id' => $model->id]);
                        return $url;
                    }
                }
            ],
        ],
    ]); ?>
    
</div>
