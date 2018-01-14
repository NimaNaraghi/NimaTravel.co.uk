<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChangePasswordForm */
/* @var $form ActiveForm */
?>
<!--banner-->
<div class="banner-top">
    <div class="container">
        <h2 class="animated wow fadeInLeft" data-wow-delay=".5s"><?= Yii::$app->user->identity->getGoodName() ?></h2>
        <h3 class="animated wow fadeInRight" data-wow-delay=".5s"><?= Yii::t('app', 'Profile') ?></h3>
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
                <h3><?= Yii::t('app', 'Profile') ?></h3>
            </div>
            <?php $form = ActiveForm::begin(); ?>
           <div class="col-md-9 contact-grids1 animated wow fadeInRight" data-wow-delay=".5s">
                <div class="contact-form2">

                    <?=
                    $form->field($model, 'first_name', ['options' => ['class' => ''],
                        'errorOptions' => [],
                        'template' => '<h4>{label}</h4>{input}{hint}{error}'])->textInput(['class' => null]);
                    ?>	
                </div>
                <div class="contact-form2">

                    <?=
                    $form->field($model, 'last_name', ['options' => ['class' => ''],
                        'errorOptions' => [],
                        'template' => '<h4>{label}</h4>{input}{hint}{error}'])->textInput(['class' => null]);
                    ?>	
                </div>
                <div class="contact-form2">

<?=
$form->field($model, 'address', ['options' => ['class' => ''],
    'errorOptions' => [],
    'template' => '<h4>{label}</h4>{input}{hint}{error}'])->textInput(['class' => null]);
?>	
                </div>
                <div class="contact-form2">

<?=
$form->field($model, 'phone', ['options' => ['class' => ''],
    'errorOptions' => [],
    'template' => '<h4>{label}</h4>{input}{hint}{error}'])->textInput(['class' => null]);
?>	
                </div>
                <input type="submit" value="Submit">
            </div>

            <div style="display:none">
<?= $form->field($model, 'honeypot')->textInput() ?>
            </div>
<?php ActiveForm::end(); ?>
        </div>


    </div>
<?= $this->render('/site/_messages') ?>