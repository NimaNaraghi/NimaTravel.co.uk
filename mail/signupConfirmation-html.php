<?php
use yii\helpers\Html;
//use \Yii;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $user common\models\User */


?>
<div>
Dear Participant,<br>
<p>
    Please follow the link below to activate your account and plan your travel!<br>
<?= \yii\helpers\Html::a(Yii::t('app','Click here to begin!'),
                Yii::$app->urlManager->createAbsoluteUrl(['site/confirm',
                    'id'=>$user->id,
                    'key'=>$user->auth_key])
            ); 
    ?>
</p>

Kind Regards,<br>
Nima Naraghi<br>

</div>
