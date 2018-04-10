<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
if(Yii::$app->session->hasFlash('supplier')){
    $this->registerJs("$('#user').modal();", $this::POS_END);
    
}

Modal::begin([
            'header' => Yii::t('app','Hola!'),
            'id' => 'user',
        ]);
        if(Yii::$app->session->hasFlash('supplier')){
            echo Html::tag('p',Yii::$app->session->getFlash('supplier'));
        }
        
Modal::end(); 

?>