<?php

use yii\helpers\Html;
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
    <?php Pjax::begin(); ?>
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
