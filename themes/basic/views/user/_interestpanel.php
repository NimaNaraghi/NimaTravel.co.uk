<?php
use kartik\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;
use yii\helpers\Html;
$i = 0;
$row = true;
?>
<?php foreach ($options as $item): ?>
    <?php
    if ($row == true) {
        echo Html::beginTag('div', ['class'=>'row']);
        $row = false;
    }
   
    ?>
    <div class="col-md-3">
        <img src="<?= $item->getImageURL() ?>"  class="img-responsive interest-image" alt="<?= $item->title ?>">
        <div class="interest-title small">
    <?=
            
    CheckboxX::widget([
        'name' => $className . '_' . $item->id,
        'options' => ['id' => $className .  '_' . $item->id],
        'pluginOptions' => ['threeState' => false],
        'autoLabel' => true,
        'labelSettings' => [
            'label' => $item->title,
            'position' => CheckboxX::LABEL_RIGHT
        ]
    ]);
    ?>
        </div>

    </div>
    <?php
    $i++;
    if ($i == 4) {
        echo Html::endTag("div");
        $row = true;
        $i=0;
    }else{
        $row = false;
    }
    ?>
<?php endforeach; ?>
<?php 
    if($row == false){
        echo Html::endTag("div");
    }
?>

