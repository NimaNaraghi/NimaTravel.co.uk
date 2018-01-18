<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\widgets\ActiveForm;
use kartik\daterange\DateRangePicker;
use kartik\widgets\ActiveForm;

$this->title = Yii::t('app', 'Home');
?>
<div class="col-md-3">
    <?php
        echo $form->field($model, 'date_range', [
            'addon'=>['prepend'=>['content'=>'<i class="glyphicon glyphicon-calendar"></i>']],
            'options'=>['class'=>'drp-container form-group']
        ])->widget(DateRangePicker::classname(), [
            'useWithAddon'=>true
        ]);
    ?>
</div>
<div class="col-md-6">
    
</div>
<div class="col-md-3">
    
</div>

