<?php
use yii\widgets\ListView;
?>

<div class="col-md-4">
    <h2>My Preference Sets</h2>
    
    <?php
        if($preferenceDataProvider != null){
            ListView::widget([
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
            ListView::widget([
                'dataProvider' => $offerDataProvider,
                'viewParams' => ['preferenceId' => $id],
                'itemView' => '_offer',
                'summary' => false,
            ]);
        }else{
            echo "No offers yer :(";
        }
    ?>
</div>

