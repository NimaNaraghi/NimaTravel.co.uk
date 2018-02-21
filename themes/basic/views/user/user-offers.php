<?php
use yii\widgets\ListView;
?>

<div class="col-md-4">
    <h2>My Preference Sets</h2>
    <?= ListView::widget([
        'dataProvider' => $preferenceDataProvider,
        'viewParams' => ['id' => $id],
        'itemView' => '_preference',
        'summary' => false,
    ]);
    ?>
</div>
<div class="col-md-8">
    <h2>Offers</h2>
    <?= ListView::widget([
        'dataProvider' => $offerDataProvider,
        'viewParams' => ['preferenceId' => $id],
        'itemView' => '_offer',
        'summary' => false,
    ]);
    ?>
</div>

