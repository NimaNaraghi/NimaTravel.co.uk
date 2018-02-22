<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\supplier\models\OfferImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offer-image-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <?= $form->field($model, 'imageFile')->fileInput() ?>
        <div class="input-group">
        <?= $form->field($model, 'title', [
                'template' => '<div class="input-group">{input}<span class="input-group-btn">'.
                    Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) . '</span></div>{hint}{error}',
            ])->textInput(['maxlength' => true]) ?>
        
        </div>
  

    <?php ActiveForm::end(); ?>

</div>
