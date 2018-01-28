<?php
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;

echo Html::tag("H4", ucfirst($header));
echo Html::beginTag("ul", ['class' => 'list-unstyled']);



foreach ($options as $option) {
    echo Html::beginTag("li");

    echo CheckboxX::widget([
        'name' => $form . '[' . $option->formName() . '][]',
        'options' => ['id' => $form . '-' . $option->formName() . '-' . $option->id],
        'pluginOptions' => ['threeState' => false],
        'autoLabel' => true,
        'labelSettings' => [
            'label' => $option->title,
            'position' => CheckboxX::LABEL_RIGHT
        ]
    ]);
    echo Html::beginTag("li");
}
echo Html::endTag("ul");
?>