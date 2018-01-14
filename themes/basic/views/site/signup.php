<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
?>
<!--banner-->
<div class="banner-top">
    <div class="container">
        <h2 class="animated wow fadeInLeft" data-wow-delay=".5s"><?= isset($this->params['counter']) ? $this->params['counter'] : null ?></h2>
        <h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="<?= Url::home() ?>"><?= Yii::t('app', 'Home') ?></a><label>/</label><?= Yii::t('app', 'Register') ?></h3>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="login">
    <div class="container">
        <?php $form = ActiveForm::begin(['id' => 'form-signup', 'fieldConfig' => ['checkboxTemplate' => "<div class=\"checkbox1\">\n{beginLabel}\n{input}\n<i> </i>{labelTitle}\n{endLabel}\n<a target='_blank' href='" . Url::to(['site/terms']) . "'>terms</a></div>\n{error}\n{hint}"]]); ?>
        <div class="col-md-6 login-do1 animated wow fadeInLeft" data-wow-delay=".5s">

            <?= $form->field($model, 'email', ['options' => ['class' => ''], 'errorOptions' => [], 'template' => '{hint}{error}<div class="login-mail">{input}<i class="glyphicon glyphicon-envelope"></i></div>'])->textInput(['class' => null, 'placeholder' => Yii::t('app', 'Email')]); ?>	


            <?= $form->field($model, 'password', ['options' => ['class' => ''], 'errorOptions' => [], 'template' => '{hint}{error}<div class="login-mail">{input}<i class="glyphicon glyphicon-lock"></i></div>'])->passwordInput(['class' => null, 'placeholder' => Yii::t('app', 'Password')]) ?>

            <?= $form->field($model, 'termsAgreement')->checkbox(); ?>
           

                
                
            

        </div>
        <div class="col-md-6 login-do animated wow fadeInRight" data-wow-delay=".5s">
            <label class="hvr-sweep-to-top login-sub">
                <input type="submit" value="Submit">
            </label>
            <p><?= Yii::t('app', 'Already registered?') ?></p>
            <a href="<?= Url::to(['site/login']) ?>" class="hvr-sweep-to-top">Login</a>
        </div>
        <div class="clearfix"> </div>
        <div style="display:none">
            <?= $form->field($model, 'honeypot')->textInput() ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>


</div>



