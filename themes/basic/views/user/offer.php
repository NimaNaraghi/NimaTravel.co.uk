<?php
use yii\helpers\Html;
use yii\bootstrap\Carousel;
use yii\helpers\Url;

Url::remember();
$items = [];
foreach($offer->offerImages as $image)
{
    $items[] =  ['content' => '<img src="' . $image->getImageURL() . '"/>'];
}

//print_r($items);
?>

<div class="col-md-8">

<?php
echo Carousel::widget([
    'items' => $items
]);

?>
Location: <?= $offer->location ?> <br>
Price: <?= Yii::$app->formatter->asCurrency($offer->price) ?> 

<?= Html::a("Call",['user/reaction','id' => $offer->id, 'action' => app\modules\supplier\models\Offer::STATUS_CALL],
        ['class' => 'btn btn-warning pull-right', 'role' => 'button']) ?>

<?= Html::a("Reserve",['user/reaction', 'id' => $offer->id,'action' => app\modules\supplier\models\Offer::STATUS_RESERVE]
        ,['class' => 'btn btn-success pull-right', 'role' => 'button']) ?> 
<br>
Departure: <?= Yii::$app->formatter->asDate($offer->departure_date) ?> <br>
Return: <?= Yii::$app->formatter->asDate($offer->return_date) ?> <br>
Description: <?= $offer->description ?> <br>
<h2> Included These Activities </h2>
<?php foreach($offer->thingsToDos as $thing){
    echo $this->render('_things',['thing' => $thing]);
}
?>
</div>
<div class="col-md-4">
    <?= $this->render('_preference',['model' => $preference,'id' => false]) ?>
</div>