<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;


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
        
        <div class="col-md-12 animated wow fadeInRight" data-wow-delay=".5s">
           <?= Yii::t('app', 'Sorry, there is nothing to sale'); ?>
        </div>
    </div>
</div>
