<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
$this->title = Yii::t('app','Buy');
?>
<!--banner-->
        <div class="banner-top">
            <div class="container">
                <h2 class="animated wow fadeInLeft" data-wow-delay=".5s"><?= isset($this->params['counter']) ? $this->params['counter'] : null ?></h2>
                <h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="<?= Url::home() ?>"><?= Yii::t('app','Home') ?><label>/</label></a><?= Yii::t('app','Buy') ?></h3>
                <div class="clearfix"> </div>
            </div>
        </div>
<div class="login">
    <div class="container">
        <?php $form = ActiveForm::begin(['id' => 'form-buy', 'fieldConfig' => ['checkboxTemplate' => "<div class=\"checkbox1\">\n{beginLabel}\n{input}\n<i> </i>{labelTitle}\n{endLabel}\n</div>\n{error}\n{hint}"]]); ?>
        <div class="col-md-8 contact-grids1 animated wow fadeInRight" data-wow-delay=".5s">
            <div class="contact-form2">
		
                <?= $form->field($model,
                        'first_name',
                        ['options' => ['class' => ''],
                            'errorOptions' => [],
                            'template' => '<h4>{label}</h4>{input}{hint}{error}'])->textInput(['class' => null]); 
                ?>	
            </div>
            <div class="contact-form2">
		
                <?= $form->field($model,
                        'last_name',
                        ['options' => ['class' => ''],
                            'errorOptions' => [],
                            'template' => '<h4>{label}</h4>{input}{hint}{error}'])->textInput(['class' => null]); 
                ?>	
            </div>
            <div class="contact-form2">
		
                <?= $form->field($model,
                        'address',
                        ['options' => ['class' => ''],
                            'errorOptions' => [],
                            'template' => '<h4>{label}</h4>{input}{hint}{error}'])->textInput(['class' => null]); 
                ?>	
            </div>
            <div class="contact-form2">
		
                <?= $form->field($model,
                        'phone',
                        ['options' => ['class' => ''],
                            'errorOptions' => [],
                            'template' => '<h4>{label}</h4>{input}{hint}{error}'])->textInput(['class' => null]); 
                ?>	
            </div>
            <input type="submit" value="Submit">
        </div>
        <div class="col-md-4 contact-grids">
            <div class=" contact-grid animated wow fadeInLeft" data-wow-delay=".5s">
                    <div class="contact-grid1">
                            <div class="contact-grid2 ">
                                    <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                            </div>
                            <div class="contact-grid3">
                                    <h4>Address</h4>
                                    <p>12K Street, 45 Building Road <span>New York City.</span></p>
                            </div>
                    </div>
            </div>
        </div>
        <div style="display:none">
            <?= $form->field($model, 'honeypot')->textInput() ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>


</div>










