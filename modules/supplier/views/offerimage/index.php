<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\supplier\models\OfferImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

Url::remember();

?>
<div class="offer-image-index">

    
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
           
            //'title',
            [
                'class' => 'yii\grid\DataColumn',
                'format' => 'html',
                'attribute' => 'ImageFile',
                'content' => function($data){ 
                    $image = $data->getImageURL();
                    
                    return Html::img($image,['class'=>'img img-responsive']).Html::tag("h5",$data->title); 
                    
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => Yii::t('app', 'lead-delete'),
                        ],['data-method' => 'post']);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'delete') {
                        $url = Url::to(['offer/delete-offer-image','id' => $model->id]);
                        return $url;
                    }
                }
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
