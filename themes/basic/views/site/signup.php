<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
?>
<!--banner-->

<div class="login">
    <div class="container">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div class="col-md-6 ">

            <?= $form->field($model, 'username')->textInput(['class' => null, 'placeholder' => Yii::t('app', 'Username')]); ?>	


            <?= $form->field($model, 'password')->passwordInput(['class' => null, 'placeholder' => Yii::t('app', 'Password')]) ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Register'), ['class' => 'btn btn-success']) ?>
            </div>

        </div>
        
        <div style="display:none">
            <?= $form->field($model, 'honeypot')->textInput() ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>


</div>



