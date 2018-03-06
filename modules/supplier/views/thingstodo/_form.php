<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\daterange\DateRangePicker;
use kartik\markdown\MarkdownEditor;
/* @var $this yii\web\View */
/* @var $model app\modules\supplier\models\ThingsToDo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="things-to-do-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'highlights')->widget(
	MarkdownEditor::classname(), 
	['height' => 300, 'encodeLabels' => false]
); ?>

    <?= $form->field($model, 'description')->widget(
	MarkdownEditor::classname(), 
	['height' => 300, 'encodeLabels' => false]
); ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

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
            'startAttribute' => 'begin_date',
            'endAttribute' => 'end_date',
            'pluginOptions'=>[
                'locale'=>['format' => 'Y-m-d'],
            ]
        ]);
    }
   ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
