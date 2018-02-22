<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\supplier\models\ThingsToDoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Things To Dos');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="things-to-do-index">

    
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],


            'title',
            [
                'class' => 'yii\grid\DataColumn',
                'format' => 'html',
                'attribute' => 'ImageFile',
                'content' => function($data){ 
                    $image = $data->getImageURL();
                    
                    return Html::img($image,['class'=>'img img-responsive']); 
                    
                },
            ],
            'price:currency',
            'begin_date:date',
            'end_date:date',

            [
                'class' => 'yii\grid\ActionColumn',
                //'template' => '{view}{edit}{delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => Yii::t('app', 'lead-delete'),
                        ],['data-method' => 'post']);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'delete') {
                        $url = Url::to(['offer/delete-things-to-do','id' => $model->id]);
                        return $url;
                    }
                    if ($action === 'view') {
                        $url = Url::to(['thingstodo/view','id' => $model->id]);
                        return $url;
                    }
                    if ($action === 'update') {
                        $url = Url::to(['thingstodo/update','id' => $model->id]);
                        return $url;
                    }
                }
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
