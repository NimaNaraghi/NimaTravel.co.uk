<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="panel panel-default">
  <div class="panel-body">
    Budget :  <?= Yii::$app->formatter->asCurrency($model->max_budget) ?>  <br>
    Departure Date :  <?= Yii::$app->formatter->asDate($model->departure_date) ?>  <br>
    Return Date :  <?= Yii::$app->formatter->asDate($model->return_date) ?> <br>
    Climate : <?php 
        foreach($model->climates as $climate)
        {
            echo $climate->title . " ";
        }
    ?> <br>
    Activity : <?php 
                    foreach($model->activities as $activity)
                    {
                        echo $activity->title . " ";
                    }
                    ?> <br>
    Style : <?php 
        foreach($model->styles as $style)
        {
            echo $style->title . " ";
        }
        ?> <br>
    Accommodation Features : <?php 
        foreach($model->accommodationFeatures as $feature)
        {
            echo $feature->title . " ";
        }
    ?> <br>
    Accessibility : <?php 
        foreach($model->accessibilities as $accessibility)
        {
            echo $accessibility->title . " ";
        }
    ?> <br>
    Board Basis : <?php 
        foreach($model->boardBases as $bb)
        {
            echo $bb->title . " ";
        }
    ?> <br>
    <?php
        if($id != false){
            if($model->id == $id){
                $active = " active";
            }else{
                $active = "";
            }
            echo Html::a("Show Offers<span class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></span>",
                ['user/offers','id'=>$model->id],['class' => 'btn btn-info pull-right' . $active,'role'=>'btn']);
        }else{
            echo Html::a("<span class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></span> Back to all offers",
                ['user/offers','id'=>$model->id],['class' => 'btn btn-info pull-right','role'=>'btn']);
        }
    ?>
  </div>
</div>

