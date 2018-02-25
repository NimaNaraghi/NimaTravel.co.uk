<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\ActiveForm;

$this->title = Yii::t('app','Login');
?>

<div class="login">
    <div class="container">
<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div class="col-md-6 " >
            
<?= $form->field($model, 'username')->textInput(['class' => null, 'placeholder' => Yii::t('app', 'Username')]); ?>	
            
            
<?= $form->field($model, 'password')->passwordInput(['class' => null, 'placeholder' => Yii::t('app', 'Password')]) ?>
           
            
            <a  href="#">

<?= $form->field($model, 'rememberMe')->checkbox(); ?>
            </a>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-success']) ?>
            </div>
        </div> 
        <?php ActiveForm::end(); ?>
    </div>

</div>
<?= $this->render('_messages'); ?>