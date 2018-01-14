<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
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

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>

    </div>
</div>
