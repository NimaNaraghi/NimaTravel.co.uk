<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            [
                'attribute' => 'user_id',
                'value' => $model->user->username,
            ],
            [
                    'label' => 'email',
                    'value' => $model->user->email,
                ],
            'created_at:date',
//            'updated_at',
            'departure_date:date',
            'return_date:date',
            'max_budget:currency',
            'adults',
            'children',
            'departure_location',
            'favourite_destinations:ntext',
            'comment:ntext',
            [
                'label' => 'Climate',
                'value' => function($model){
                    $result = "";
                    foreach($model->climates as $climate)
                    {
                        $result .= $climate->title . ", ";
                    }
                    return $result;
                }
            ],
            [
                'label' => 'Accessibility',
                'value' => function($model){
                    $result = "";
                    foreach($model->accessibilities as $accessibility)
                    {
                        $result .= $accessibility->title . ", ";
                    }
                    return $result;
                }
            ],
            [
                'label' => 'Accommodation Features',
                'value' => function($model){
                    $result = "";
                    foreach($model->accommodationFeatures as $feature)
                    {
                        $result .= $feature->title . ", ";
                    }
                    return $result;
                }
            ],
            [
                'label' => 'Accommodation Type',
                'value' => function($model){
                    $result = "";
                    foreach($model->accommodationTypes as $type)
                    {
                        $result .= $type->title . ", ";
                    }
                    return $result;
                }
            ],
            [
                'label' => 'Activity',
                'value' => function($model){
                    $result = "";
                    foreach($model->activities as $activity)
                    {
                        $result .= $activity->title . ", ";
                    }
                    return $result;
                }
            ],
            [
                'label' => 'Video',
                'format' => 'raw',
                'value' => function($model){
                    $result = "";
                    foreach($model->videos as $video)
                    {
                        $result .= Html::tag("div", $video->link, ['class'=>'col-md-6 interest-video']);
                    }
                    return $result;
                }
            ],
            [
                'label' => 'Style',
                'value' => function($model){
                    $result = "";
                    foreach($model->styles as $style)
                    {
                        $result .= $style->title . ", ";
                    }
                    return $result;
                }
            ],
            'status',
        ],
    ]) ?>

