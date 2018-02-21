<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="panel panel-default">
  <div class="panel-heading"><?= $model->title ?></div>
  <div class="panel-body">
      <div class="media">
          <div class="media-left">
              <a href="">
                  
                  <img class="media-object" src="<?= $model->getMainImageURL(); ?>" alt="Offer-Image" width="140px" height="140px">
              </a>
          </div>
          <div class="media-body">
              <h4 class="media-heading">Price :  <?= $model->price ?> </h4>
              Date :  <?= Yii::$app->formatter->asDate($model->preference->departure_date) ?> <br>
              To :  <?= Yii::$app->formatter->asDate($model->preference->return_date) ?> <br>
              Location : <?= $model->location ?> <br>
                Climate : <?php 
                    foreach($model->preference->climates as $climate)
                    {
                        echo $climate->title . " ";
                    }
                    ?> <br>
                Activity : <?php 
                    foreach($model->preference->activities as $activity)
                    {
                        echo $activity->title . " ";
                    }
                    ?> <br>
                Accessibility : <?php 
                    foreach($model->preference->climates as $climate)
                    {
                        echo $climate->title . " ";
                    }
                    ?> <br>
          <?= Html::a("More Info",Url::to(['user/offer','id' => $model->id,'preferenceid' => $preferenceId]),
                  ['class'=>"btn btn-primary pull-right",'role'=>'button']) ?>
          </div>
          
      </div>
     
    
  </div>
</div>



