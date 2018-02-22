<?php
use yii\helpers\Html;
?>
<div class="panel panel-default">
  <div class="panel-heading"><?= $thing->title ?></div>
  <div class="panel-body">
      <?= Html::img($thing->getImageURL(),['class' => 'img img-responsive']) ?>
      <h3>Highlights</h3>
      <?= $thing->highlights ?>
      <h3>Description</h3>
      <?= $thing->description ?>
  </div>
</div>

