<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'mnaraghi.com',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [
                'label' => 'Preferences',
                'items' => [
                    ['label' => Yii::t('app','Front-End'), 'url' => ['/user/user-home']],
                    ['label' => Yii::t('app','Admin Home'), 'url' => ['default/index']],
                    ['label' => Yii::t('app','Climates'), 'url' => ['climate/index']],
                    ['label' => Yii::t('app','Accommodation Features'), 'url' => ['accommodationfeature/index']],
                    ['label' => Yii::t('app','Styles'), 'url' => ['style/index']],
                    ['label' => Yii::t('app','Activities'), 'url' => ['activity/index']],
                    ['label' => Yii::t('app','Accessibilities'), 'url' => ['accessibility/index']],
                    ['label' => Yii::t('app','Accommodation Types'), 'url' => ['accommodationtype/index']],
                    ['label' => Yii::t('app','Board Basis'), 'url' => ['boardbases/index']],
                    ['label' => Yii::t('app','Video'), 'url' => ['video/index']],
                ],
            ],
            
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink' => ['label' => Yii::t('app','Admin Home'), 'url' => ['/admin']],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; mnaraghi.com <?= date('Y') ?></p>

        
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
