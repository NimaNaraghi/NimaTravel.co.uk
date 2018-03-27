<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use kartik\daterange\DateRangePicker;
/* @var $this yii\web\View */
/* @var $model app\modules\supplier\models\Offer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="offer-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'board_basis_id')->dropdownList(
            app\modules\admin\models\BoardBasis::find()->select(['title', 'id'])->indexBy('id')->column(),
            ['prompt'=>Yii::t('app','Select Board Basis')]
        );
    ?>
    <?php  
    if($model->isNewRecord){
       echo $form->field($model, 'date_range', [
            'addon'=>['prepend'=>['content'=>'<i class="glyphicon glyphicon-calendar"></i>']],
            'options'=>['class'=>'drp-container form-group']
        ])->widget(DateRangePicker::classname(), [
            'useWithAddon'=>true
        ]); 
    }else{
        echo '<label class="control-label" for="offer-date_range">Date Range</label>';
        echo DateRangePicker::widget([
            'model'=>$model,
            'attribute' => 'date_range',
            //'useWithAddon'=>true,
            'convertFormat'=>true,
            'startAttribute' => 'departure_date',
            'endAttribute' => 'return_date',
            'pluginOptions'=>[
                'locale'=>['format' => 'Y-m-d'],
            ]
        ]);
    }
   ?>
    

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model,'description')->textarea() ?>

    <?= $form->field($model, 'longitude')->textInput() ?>

    <?= $form->field($model, 'latitude')->textInput() ?>

    


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
