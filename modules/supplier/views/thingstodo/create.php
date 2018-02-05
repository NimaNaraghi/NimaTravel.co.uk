<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\supplier\models\ThingsToDo */

$this->title = Yii::t('app', 'Create Things To Do');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Things To Dos'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="things-to-do-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
