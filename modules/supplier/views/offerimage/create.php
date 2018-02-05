<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\supplier\models\OfferImage */

$this->title = Yii::t('app', 'Add Image');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Add Images'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-image-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
