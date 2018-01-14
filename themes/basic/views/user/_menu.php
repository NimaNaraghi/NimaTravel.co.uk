<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<div class="categories animated wow fadeInUp animated" data-wow-delay=".5s" >
    <ul class="cate">
        <li><i class="glyphicon glyphicon-menu-right" ></i><a href="<?= Url::to(['user/profile']) ?>"><?= Yii::t('app', 'Profile') ?></a> </li>
        <li><i class="glyphicon glyphicon-menu-right" ></i><a href="<?= Url::to(['user/account']) ?>"><?= Yii::t('app', 'Account') ?></a> </li>
        <li><i class="glyphicon glyphicon-menu-right" ></i><a href="<?= Url::to(['user/password']) ?>"><?= Yii::t('app', 'Password') ?></a> </li>
        <li><i class="glyphicon glyphicon-menu-right" ></i><a href="<?= Url::to(['user/history']) ?>"><?= Yii::t('app', 'History') ?></a> </li>
    </ul>
</div>

