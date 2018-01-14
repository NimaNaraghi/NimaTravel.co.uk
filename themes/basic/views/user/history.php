<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use app\models\Buy;

/* @var $this yii\web\View */

$this->title = Yii::$app->user->identity->getGoodName() . ' : ' .Yii::t('app','History');
?>
<!--banner-->
<div class="banner-top">
    <div class="container">
        <h2 class="animated wow fadeInLeft" data-wow-delay=".5s"><?= Yii::$app->user->identity->getGoodName() ?></h2>
        <h3 class="animated wow fadeInRight" data-wow-delay=".5s"><?= Yii::t('app', 'History') ?></h3>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="login">
    <div class="container">
        <div class="col-md-3 product-bottom">
            <?= $this->render('_menu'); ?>
        </div>
        <div class="col-md-9 direction-rtl">
            <div class="page-header">
                <h3><?= Yii::t('app', 'History') ?></h3>
            </div>
            <div class="col-md-12 animated wow fadeInLeft" data-wow-delay=".5s">
         <?=
                    GridView::widget([
                        'dataProvider' => $provider,
                        'options' => ['class' => 'grid-view table-responsive direction-rtl'],
                        'tableOptions' => ['class' => 'table'],
                        'summary' => false,
                        'columns' => [
                            'id',
                            
                            
                            'created_at:date',
                            [
                                'attribute' => 'status',
                                'value' => function ($data) {
                                    return Buy::getStatusLabels()[$data->status];
                                },
                            ],
                            'description',
                            [
                                'label' => 'Item',
                                'format' => 'html',
                                'value' => function($data){
                                    if(isset($data->item)){
                                        $item = $data->item;
                                        return '
                                        <div class="media">
                                            <div class="media-left">
                                              
                                                <img class="media-object" src="' . $item->getFeaturedImage() . '" alt="' . $item->title .'" height="64" weight="64">
                                              
                                            </div>
                                            <div class="media-body">
                                              <h4 class="media-heading">' . $item->title . '</h4>
                                              
                                            </div>
                                        </div>';
                                       
                                    }
                                }
                            ]

                        ],
                    ]);
            ?>
            </div>
        </div>
    </div>
</div>