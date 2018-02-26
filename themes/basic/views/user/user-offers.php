<?php
use yii\widgets\ListView;
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
                'emptyText' => 'The tour agencies and other suppliers are reviewing your preferences...<br>
                Although it usually takes no longer than 15 min, you will recieve an email when they sent you their offers.<br>
                Meanwhile, you can live your life instead of getting headache by searching through infinit number of options out there.<br>
                KEEP CALM AND LEAVE IT TO THE HANDS OF EXPERTS.
                '
            ]);
        }else{
            echo "No offers yer :(";
        }
    ?>
</div>

