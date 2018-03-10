<?php
use yii\helpers\Html;
//use \Yii;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $user common\models\User */


?>
<div >
    

    <p>New Preference <?= $model->id ?> </p>
    <p>Username: <?= $user->username ?> </p>
    <p>UserID: <?= $user->id ?> </p>
    <p><?= Html::a("Go to preferences",Url::to(['/supplier/preference/view','id'=>$model->id],true)) ?></p>
   
    
    
</div>
