<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = Yii::t('app', 'Terms');
?>
<!--banner-->
<div class="banner-top">
    <div class="container">
        <h2 class="animated wow fadeInLeft" data-wow-delay=".5s"><?= isset($this->params['counter']) ? $this->params['counter'] : null ?></h2>
        
        <div class="clearfix"> </div>
    </div>
</div>
<div class="product">
    <div class="container">

        <p>
            <?= Yii::t('app', 'There\'s probably no term. Now stop worrying and enjoy using our services. '); ?>
        </p>
    </div>
</div>
