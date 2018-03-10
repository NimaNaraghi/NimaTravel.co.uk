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
        <h1>Please use the username and password that I already sent you by an email.</h1>
<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div class="col-md-6 " >
            
<?= $form->field($model, 'username')->textInput(['class' => null, 'placeholder' => Yii::t('app', 'Username')]); ?>	
            
            
<?= $form->field($model, 'password')->passwordInput(['class' => null, 'placeholder' => Yii::t('app', 'Password')]) ?>
           
            
            <a  href="#">
               
<?= $form->field($model, 'PIS')->checkbox() . Html::button('Participant Information Sheet',['class' => 'btn btn-danger btn-xs ','data-toggle'=>'modal', 'data-target' => '#pis']) ; ?>
<?= $form->field($model, 'rememberMe')->checkbox(); ?>
            </a>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-success']) ?>
            </div>
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