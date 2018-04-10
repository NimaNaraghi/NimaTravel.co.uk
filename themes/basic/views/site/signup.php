<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\ActiveForm;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
?>
<!--banner-->

<div class="login">
    <div class="container">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div class="col-md-6 ">

            <?= $form->field($model, 'email')->textInput(['class' => null, 'placeholder' => Yii::t('app', 'Email')]); ?>	

            <?= $form->field($model, 'password')->passwordInput(['class' => null, 'placeholder' => Yii::t('app', 'Password')]) ?>
            
            <?= $form->field($model, 'password_repeat')->passwordInput() ?>
            <p>
            <a  href="#">
               
            <?= $form->field($model, 'PIS')->checkbox() . Html::button('Participant Information Sheet',['class' => 'btn btn-danger btn-xs ','data-toggle'=>'modal', 'data-target' => '#pis']) ; ?>

            </a>
            </p>
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
<?php
Modal::begin([
    'header' => '<h2>P.I.S</h2>',
    'size' => 'modal-lg',
    'id' => 'pis'
]);

echo \file_get_contents(Yii::$app->basePath.'/themes/basic/views/site/pis.html');

Modal::end();
?>


