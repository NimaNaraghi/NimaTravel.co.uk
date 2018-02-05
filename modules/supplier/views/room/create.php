<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\supplier\models\Room */

$this->title = Yii::t('app', 'Add Room');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rooms'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
