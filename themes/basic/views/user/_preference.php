<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="panel panel-default">
  <div class="panel-body">
    Budget :  <?= Yii::$app->formatter->asCurrency($model->max_budget) ?>  <br>
    Departure Date : <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <?= Yii::$app->formatter->asDate($model->departure_date) ?>  <br>
    Return Date : <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>  <?= Yii::$app->formatter->asDate($model->return_date) ?> <br>
    <?php 
        foreach($model->climates as $climate)
        {
            echo '<button class="btn btn-xs btn-primary active">'.$climate->title.'</button>';
        }
    ?> <br>
    <div>
    <?php 
                    foreach($model->activities as $activity)
                    {
                        echo '<button class="btn btn-xs btn-primary active">'.$activity->title .'</button>';
                    }
                    ?>
    </div>
    <div>
    <?php 
        foreach($model->styles as $style)
        {
            echo '<button class="btn btn-xs btn-primary active">'.$style->title.'</button>';
        }
        ?> 
    </div>
    <div>
    <?php 
        foreach($model->accommodationFeatures as $feature)
        {
            echo '<button class="btn btn-xs btn-primary active">'.$feature->title.'</button>';
        }
    ?> 
    </div>
    <div>
    <?php 
        foreach($model->accessibilities as $accessibility)
        {
            echo '<button class="btn btn-xs btn-primary active">'.$accessibility->title.'</button>';
        }
    ?> 
    </div>
    <div>
    <?php 
        foreach($model->boardBases as $bb)
        {
            echo '<button class="btn btn-xs btn-primary active">'.$bb->title.'</button>';
        }
    ?> 
    </div>
    <div>
    <?php 
        foreach($model->videos as $video)
        {
            echo '<button class="btn btn-xs btn-primary active">'.$video->title.'</button>';
        }
    ?> 
    </div>
    <?php
        if($id != false){
            if($model->id == $id){
                $active = " btn-warning active";
            }else{
                $active = " btn-info";
            }
            echo Html::a("Show Offers<span class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></span>",
                ['user/offers','id'=>$model->id],['class' => 'btn pull-right' . $active,'role'=>'btn']);
        }else{
            echo Html::a("<span class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></span> Back to all offers",
                ['user/offers','id'=>$model->id],['class' => 'btn btn-info pull-right','role'=>'btn']);
        }
    ?>
    
  </div>
</div>

