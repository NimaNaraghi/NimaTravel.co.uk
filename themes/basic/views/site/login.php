<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app','Login');
?>
<!--banner-->
        <div class="banner-top">
            <div class="container">
                <h2 class="animated wow fadeInLeft" data-wow-delay=".5s"><?= isset($this->params['counter']) ? $this->params['counter'] : null ?></h2>
                <h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="<?= Url::home() ?>"><?= Yii::t('app','Home') ?></a><label>/</label><?= Yii::t('app','Login') ?></h3>
                <div class="clearfix"> </div>
            </div>
        </div>
<div class="login">
    <div class="container">
<?php $form = ActiveForm::begin(['id' => 'form-signup', 'fieldConfig' => ['checkboxTemplate' => "<div class=\"checkbox1\">\n{beginLabel}\n{input}\n<i> </i>{labelTitle}\n{endLabel}\n</div>\n{error}\n{hint}"]]); ?>
        <div class="col-md-6 login-do1 animated wow fadeInLeft" data-wow-delay=".5s">
            
<?= $form->field($model, 'email', ['options' => ['class' => ''], 'errorOptions' => [], 'template' => '{hint}{error}<div class="login-mail">{input}<i class="glyphicon glyphicon-envelope"></i></div>'])->textInput(['class' => null, 'placeholder' => Yii::t('app', 'Email')]); ?>	
            
            
<?= $form->field($model, 'password', ['options' => ['class' => ''], 'errorOptions' => [], 'template' => '{hint}{error}<div class="login-mail">{input}<i class="glyphicon glyphicon-lock"></i></div>'])->passwordInput(['class' => null, 'placeholder' => Yii::t('app', 'Password')]) ?>
           
            <a class="news-letter" href="<?= Url::to(['site/request-password-reset']) ?>">
                <?= Yii::t('app','Forgot Password') ?>
            </a>
            <a class="news-letter" href="#">

<?= $form->field($model, 'rememberMe')->checkbox(); ?>
            </a>

        </div>
        <div class="col-md-6 login-do animated wow fadeInRight" data-wow-delay=".5s">
            
            <label class="hvr-sweep-to-top login-sub">
                <input type="submit" value="<?= Yii::t('app', 'Login') ?>">
            </label>
            <p><?= Yii::t('app', 'Do not have an account?') ?></p>
            <a href="<?= Url::to(['site/signup']) ?>" class="hvr-sweep-to-top"><?= Yii::t('app', 'Register') ?></a>
        </div>
        <div class="clearfix"> </div>
        
            <?php ActiveForm::end(); ?>
    </div>

</div>
<?= $this->render('_messages'); ?>