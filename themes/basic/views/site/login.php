<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\ActiveForm;
use yii\bootstrap\Modal;

$this->title = Yii::t('app','Login');
?>

<div class="login">
    <div class="container">
        <h3>Please use the username and password that I already sent you by an email. If you have not them you have to signup first.</h3>
<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div class="col-md-6">
            
<?= $form->field($model, 'email')->textInput(['class' => null, 'placeholder' => Yii::t('app', 'email')]); ?>	
            
            
<?= $form->field($model, 'password')->passwordInput(['class' => null, 'placeholder' => Yii::t('app', 'Password')]) ?>
<?= $form->field($model, 'rememberMe')->checkbox(); ?>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-success']) ?>
            </div>
        </div> 
        <?php ActiveForm::end(); ?>
You have NOT signed up yet? <?= Html::a('Signup',['site/signup'],['class'=>'btn btn-primary','role'=>'button']) ?>
    </div>

</div>

