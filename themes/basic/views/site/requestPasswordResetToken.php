<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

$this->title = Yii::t('app','Request password reset');

?>
<!--banner-->
        <div class="banner-top">
            <div class="container">
                <h2 class="animated wow fadeInLeft" data-wow-delay=".5s"><?= isset($this->params['counter']) ? $this->params['counter'] : null ?></h2>
                <h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="<?= Url::home() ?>"><?= Yii::t('app','Home') ?></a><label>/</label><?= Yii::t('app', 'Reset Password') ?></h3>
                <div class="clearfix"> </div>
            </div>
        </div>
<div class="login">
    <div class="container">
<?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
        <div class="col-md-6 login-do1 animated wow fadeInLeft" data-wow-delay=".5s">
            
            
<?= $form->field($model, 'email', [
    'options' => ['class' => ''], 
    'errorOptions' => [], 
    'template' => '{hint}{error}<div class="login-mail">{input}<i class="glyphicon glyphicon-envelope"></i></div>'])
        ->textInput(['class' => null, 'placeholder' => Yii::t('app', 'Email')]); ?>	
            
            
        </div>
        <div class="col-md-6 login-do animated wow fadeInRight" data-wow-delay=".5s">
            <label class="hvr-sweep-to-top login-sub">
                <input type="submit" value="<?= Yii::t('app', 'Save') ?>">
            </label>
            
        </div>
        <div class="clearfix"> </div>
        
            <?php ActiveForm::end(); ?>
    </div>


</div>

