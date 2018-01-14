<?php
use yii\helpers\Html;
//use \Yii;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $user common\models\User */


?>
<div >
    <p ><?= Yii::t('app','Hello') . '!' ?></p>

    <p ><?= Yii::t('app','Thank you very much for your registration!') ?></p>
    
    <p ><?= Yii::t('app','Please click on the link below to active your account: ') ?></p>
    <p >
    <?= \yii\helpers\Html::a(Yii::t('app','Click Here,Please!'),
                Yii::$app->urlManager->createAbsoluteUrl(['site/confirm',
                    'id'=>$user->id,
                    'key'=>$user->auth_key])
            ); 
    ?>
    </p>
    
    
</div>
