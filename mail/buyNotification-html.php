<?php
use yii\helpers\Html;
//use \Yii;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $user common\models\User */


?>
<div >
    <p ><?= Yii::t('app','Hello') . ' ' . Html::encode($user->getGoodName()) ?>,</p>

    <p ><?= Yii::t('app','Thank you very much for buying from my website!') ?></p>
    
    <?= $model->getGoodMessage() ?>
    
    
</div>
