<?php
use yii\helpers\Html;
use yii\bootstrap\Carousel;
$items = [];
foreach($offer->offerImages as $image)
{
    $items[] =  ['content' => '<img src="' . $image->getImageURL() . '"/>'];
}

//print_r($items);
?>
<div class="col-md-4">
    <?= $this->render('_preference',['model' => $preference,'id' => false]) ?>
</div>
<div class="col-md-8">

<?php
echo Carousel::widget([
    'items' => $items
]);

?>
Location: <?= $offer->location ?> <br>
Price: <?= $offer->price ?> <br>
Departure: <?= Yii::$app->formatter->asDate($offer->departure_date) ?> <br>
Return: <?= Yii::$app->formatter->asDate($offer->return_date) ?> <br>
Description: <?= $offer->description ?> <br>
<?php foreach($offer->thingsToDos as $thing){
    echo $this->render('_things',['thing' => $thing]);
}
?>
</div>