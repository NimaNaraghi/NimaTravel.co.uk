<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
if(Yii::$app->session->hasFlash('user_confirm_message')){
    $this->registerJs("$('#user_confirm_message').modal();", $this::POS_END);
    
}
if(Yii::$app->session->hasFlash('reset_password')){
    $this->registerJs("$('#reset_password').modal();", $this::POS_END);
    
}
if(Yii::$app->session->hasFlash('buy')){
    $this->registerJs("$('#buy').modal();", $this::POS_END);
    
}
if(Yii::$app->session->hasFlash('user')){
    $this->registerJs("$('#user').modal();", $this::POS_END);
    
}
if(Yii::$app->session->hasFlash('contactFormSubmitted')){
    $this->registerJs("$('#contactFormSubmitted').modal();", $this::POS_END);
    
}
 Modal::begin([
            'header' => Yii::t('app','Account Confirmation'),
            'id' => 'user_confirm_message',
        ]);
        if(Yii::$app->session->hasFlash('user_confirm_message')){
            echo Html::tag('p',Yii::$app->session->getFlash('user_confirm_message'));
        }
        
Modal::end(); 
Modal::begin([
            'header' => Yii::t('app','Admin Speaks:'),
            'id' => 'buy',
        ]);
        if(Yii::$app->session->hasFlash('buy')){
            echo Html::tag('p',Yii::$app->session->getFlash('buy'));
        }
        
Modal::end(); 
Modal::begin([
            'header' => Yii::t('app','Reset Password'),
            'id' => 'reset_password',
        ]);
        if(Yii::$app->session->hasFlash('reset_password')){
            echo Html::tag('p',Yii::$app->session->getFlash('reset_password'));
        }
        
Modal::end();  


Modal::begin([
            'header' => Yii::$app->user->isGuest ? Yii::t('app', 'Guest') : Yii::$app->user->identity->getGoodName(),
            'id' => 'user',
        ]);
        if(Yii::$app->session->hasFlash('user')){
            echo Html::tag('p',Yii::$app->session->getFlash('user'));
        }
        
Modal::end();  

Modal::begin([
            'header' => Yii::t('app','Admin Speaks'),
            'id' => 'contactFormSubmitted',
        ]);
        if(Yii::$app->session->hasFlash('contactFormSubmitted')){
            echo Html::tag('p',Yii::$app->session->getFlash('contactFormSubmitted'));
        }
        
Modal::end();  
?>