<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--banner-->
        <div class="banner-top">
            <div class="container">
                <h2 class="animated wow fadeInLeft" data-wow-delay=".5s"><?= Yii::t('app', 'Contact') ?></h2>
                <h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="<?= Url::home() ?>"><?= Yii::t('app','Home') ?><label>/</label></a><?= Yii::t('app','Contact') ?></h3>
                <div class="clearfix"> </div>
            </div>
        </div>
<!-- contact -->
	<div class="contact">
		<div class="container">
			<div class="col-md-8 contact-grids1 animated wow fadeInRight" data-wow-delay=".5s">
        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
        <div class="col-md-8 contact-grids1 animated wow fadeInRight" data-wow-delay=".5s">
            <div class="contact-form2">
		
                <?= $form->field($model,
                        'name',
                        ['options' => ['class' => ''],
                            'errorOptions' => [],
                            'template' => '<h4>{label}</h4>{input}{hint}{error}'])->textInput(['class' => null,'autofocus' => true]); 
                ?>	
            </div>
            
            <div class="contact-form2">
		
                <?= $form->field($model,
                        'email',
                        ['options' => ['class' => ''],
                            'errorOptions' => [],
                            'template' => '<h4>{label}</h4>{input}{hint}{error}'])->textInput(['class' => null]); 
                ?>	
            </div>
            <div class="contact-form2">
		
                <?= $form->field($model,
                        'subject',
                        ['options' => ['class' => ''],
                            'errorOptions' => [],
                            'template' => '<h4>{label}</h4>{input}{hint}{error}'])->textInput(['class' => null]); 
                ?>	
            </div>
            <div class="contact-me ">
		
                <?= $form->field($model,
                        'body',
                        ['options' => ['class' => ''],
                            'errorOptions' => [],
                            'template' => '<h4>{label}</h4>{input}{hint}{error}'])->textArea(['class' => null]); 
                ?>	
            </div>
            <input type="submit" value="Submit" name='contact-button'>
        </div>
        
        <div style="display:none">
            <?= $form->field($model, 'honeypot')->textInput() ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>


</div>
            
<?= $this->render('_messages');