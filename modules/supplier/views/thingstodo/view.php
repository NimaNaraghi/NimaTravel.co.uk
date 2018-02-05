<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\supplier\models\ThingsToDo */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Things To Dos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="things-to-do-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
                'attribute' => 'offer_id',
                'value' => Html::a($model->offer->title,['offer/view','id'=>$model->offer->id]),
                'format' => 'html'
            ],
            'title',
            'highlights:ntext',
            'description:ntext',
            'price',
            'begin_date',
            'end_date',
        ],
    ]) ?>

</div>
