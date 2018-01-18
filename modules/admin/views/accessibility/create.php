<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Accessibility */

$this->title = Yii::t('app', 'Create Accessibility');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accessibilities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accessibility-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
