<?php
use yii\widgets\ListView;
use app\assets\OfferAsset;
OfferAsset::register($this);
$this->title = "Offers"
?>

<div class="col-md-4">
    <h2>My Preference Sets</h2>
    
    <?php
        if($preferenceDataProvider != null){
            echo ListView::widget([
                'dataProvider' => $preferenceDataProvider,
                'viewParams' => ['id' => $id],
                'itemView' => '_preference',
                'summary' => false,
            ]);
        }else{
            echo "please set your preferences first.";
        }
    ?>
</div>
<div class="col-md-8">
    <h2>Offers</h2>
    <?php
        if($offerDataProvider != null){
            echo ListView::widget([
                'dataProvider' => $offerDataProvider,
                'viewParams' => ['preferenceId' => $id],
                'itemView' => '_offer',
                'summary' => false,
                'emptyText' => '<p class="lead"> The tour agencies, experts and other suppliers are reviewing your preferences...<br>
                Although it usually takes no longer than 30 min, you will recieve an email when an offer is ready.<br></p>
                <p><div class="loader col-md-offset-4"></div></p>
                
                '
            ]);
        }else{
            echo "The travel agencies likes to know your preferences first. :(";
        }
    ?>
</div>

