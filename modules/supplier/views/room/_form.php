<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\supplier\models\Room */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <div class="input-group">
        <?= $form->field($model, 'title', [
        'template' => '<div class="input-group">{input}<span class="input-group-btn">'.
            Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) . '</span></div>{hint}{error}',
    ])->textInput(['maxlength' => true]) ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
