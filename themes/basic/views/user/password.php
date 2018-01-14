<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChangePasswordForm */
/* @var $form ActiveForm */
$this->title = Yii::$app->user->identity->getGoodName() . ' : ' . Yii::t('app', 'Password');
?>
<!--banner-->
<div class="banner-top">
    <div class="container">
        <h2 class="animated wow fadeInLeft" data-wow-delay=".5s"><?= Yii::$app->user->identity->getGoodName() ?></h2>
        <h3 class="animated wow fadeInRight" data-wow-delay=".5s"><?= Yii::t('app', 'Password Management') ?></h3>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="login">
    <div class="container">
        <div class="col-md-3 product-bottom">
            <?= $this->render('_menu'); ?>
        </div>
        <div class="col-md-9 direction-rtl">

            <div class="page-header">
                <h3><?= Yii::t('app', 'Change Password') ?></h3>
            </div>
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-md-9 login-do1 animated wow fadeInLeft" data-wow-delay=".5s">
                
                    
                <?= $form->field($model, 'currentPassword', 
        ['options' => ['class' => ''],
            
            'template' => '{label}{hint}{error}<div class="login-mail">{input}<i class="glyphicon glyphicon-lock"></i></div>'])
                        ->passwordInput(['class' => null]); ?>	
                
                
                <?= $form->field($model, 'newPassword', 
        ['options' => ['class' => ''],
            
            'template' => '{label}{hint}{error}<div class="login-mail">{input}<i class="glyphicon glyphicon-lock"></i></div>'])
                        ->passwordInput(['class' => null]); ?>
                
                <?= $form->field($model, 'newPassword_repeat', 
        ['options' => ['class' => ''],
            
            'template' => '{label}{hint}{error}<div class="login-mail">{input}<i class="glyphicon glyphicon-lock"></i></div>'])
                        ->passwordInput(['class' => null]); ?>
                
                <div style="display:none">
                    <?= $form->field($model, 'honeypot')->textInput() ?>
                </div>
                <div class="col-md-12 login-do animated wow fadeInRight" data-wow-delay=".5s">
                    <label class="hvr-sweep-to-top login-sub">
                        <input type="submit" value="<?= Yii::t('app', 'Save Changes') ?>">
                    </label>
                </div>
            </div>
            
            <?php ActiveForm::end(); ?>

        </div><!-- user-change_password -->
    </div>
</div>
