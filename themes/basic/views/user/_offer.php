<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="panel panel-default">
  <div class="panel-heading"><?= $model->title ?></div>
  <div class="panel-body">
      <div class="media">
          <div class="media-left">
              <a href="<?= Url::to(['user/offer','id' => $model->id,'preferenceid' => $preferenceId]) ?>">
                  <img class="media-object" src="<?= $model->getMainImageURL(); ?>" alt="Offer-Image" width="140px" height="140px">
              </a>
          </div>
          <div class="media-body">
              <h4 class="media-heading">Price :  <?= Yii::$app->formatter->asCurrency($model->price) ?> </h4>
              From : <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <?= Yii::$app->formatter->asDate($model->preference->departure_date) ?> <br>
              To : <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <?= Yii::$app->formatter->asDate($model->preference->return_date) ?> <br>
              Location : <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?= $model->location ?> <br>
                <div>
                Climate : <?php 
                    foreach($model->preference->climates as $climate)
                    {
                        echo '<button class="btn btn-xs btn-success active">' . $climate->title . "</button> ";
                    }
                    ?> </div>
               <div>
                Activity : <?php 
                    foreach($model->preference->activities as $activity)
                    {
                        echo '<button class="btn btn-xs btn-success active">' . $activity->title . "</button> ";
                    }
                    ?> </div>
               <div>
                Style : <?php 
                    foreach($model->preference->styles as $style)
                    {
                        echo '<button class="btn btn-xs btn-success active">' . $style->title . "</button> ";
                    }
                    ?> </div>
               <div>
                Accessibility : <?php 
                    foreach($model->preference->accessibilities as $accessibility)
                    {
                        echo '<button class="btn btn-xs btn-success active">' . $accessibility->title . "</button> ";
                    }
                    ?> </div>
          <?= Html::a("Details",Url::to(['user/offer','id' => $model->id,'preferenceid' => $preferenceId]),
                  ['class'=>"btn btn-primary pull-right",'role'=>'button']) ?>
          </div>
          
      </div>
     
    
  </div>
</div>



