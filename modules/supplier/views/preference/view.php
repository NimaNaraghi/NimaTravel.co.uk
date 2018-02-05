<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Preference */

$this->title = $model->user->username . ": Preference Set ID" . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Preferences'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="preference-view">
    <div class="col-md-6">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_details',['model' => $model]) ?>
        <?= $this->render('/offer/index',['dataProvider' => $offerDataProvider]) ?>
    </div>
    <div class="col-md-6">
        <?= $this->render('/offer/create',['model'=>$offerModel]); ?>
    </div>
</div>

