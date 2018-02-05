<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\supplier\models\Offer */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Offers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-view">

    
    <div class="col-md-6">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['preference/update-offer', 'offerid' => $model->id, 'id'=>$model->preference->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                [
                    'attribute' => 'user_id',
                    'value' => $model->user->username,
                ],
                'board_basis_id',
                'title',
                'price:currency',
                'location',
                'longitude',
                'latitude',
                'departure_date:date',
                'return_date:date',
                'transfer',
                'return_transfer',
                'luggage_allowance',
                'out_link',
                'created_at:datetime',
                'status',
            ],
        ]) ?>
        <h2>Preference Set</h2>
        <?= $this->render('/preference/_details',['model'=>$model->preference]) ?>
    </div>
    <div class="col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading"><h3>Images</h3></div>
            <div class="panel-body">
              <?= $this->render('/offerimage/create', ['model' => $offerImage]) ?>
                  <?= $this->render('/offerimage/index',['dataProvider' => $offerImageDataProvider]) ?>
            </div>
        </div>
        
        <div class="panel panel-info">
            <div class="panel-heading"><h3>Rooms</h3></div>
            <div class="panel-body">
              <?= $this->render('/room/create', ['model' => $room]) ?>
                  <?= $this->render('/room/index', ['dataProvider' => $roomDataProvider]) ?>
            </div>
        </div>
        
        <div class="panel panel-info">
            <div class="panel-heading"><h3>Things To Do</h3></div>
            <div class="panel-body">
              <?= $this->render('/thingstodo/create', ['model' => $thingsToDo]) ?>
              <?= $this->render('/thingstodo/index', ['dataProvider' => $thingsToDoDataProvider]) ?>
            </div>
        </div>
        
    </div>

</div>
