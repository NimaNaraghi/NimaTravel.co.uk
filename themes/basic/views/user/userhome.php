<?php
/*
 * @var $preferenceForm app\models\PreferenceForm
 * 
 */
use yii\helpers\Html;
use yii\helpers\Url;
//use yii\widgets\ActiveForm;
use kartik\daterange\DateRangePicker;
use kartik\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;


$this->title = Yii::t('app', 'Home');
?>
<div class="col-md-4">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?php
    
        echo $form->field($preferenceForm, 'date_range', [
            'addon'=>['prepend'=>['content'=>'<i class="glyphicon glyphicon-calendar"></i>']],
            'options'=>['class'=>'drp-container form-group']
        ])->widget(DateRangePicker::classname(), [
            'useWithAddon'=>true
        ]);
        
        echo $form->field($preferenceForm, 'max_budget', [
            'template' => '{label}<div class="input-group"><span class="input-group-addon">$</span>{input}</div>{hint}{error}'])
                ->textInput(['class' => null,'autofocus' => true]);
        
        echo $form->field($preferenceForm, 'adults');
        echo $form->field($preferenceForm, 'children');
        echo $form->field($preferenceForm, 'comment')->textarea();
        echo $form->field($preferenceForm, 'departure_location');
        echo $form->field($preferenceForm, 'favourite_destinations');
        
        echo Html::beginTag("ul",['class'=>'no-list-style']);
        echo Html::tag("H4", "Accessibility");
        foreach ($preferenceForm->getAccessibilitiesOptions() as $accessibility){
            echo Html::beginTag("li");
            
            echo CheckboxX::widget([
                'name'=>'accessibility_' . $accessibility->id,
                'options'=>['id'=>'accessibility_' . $accessibility->id],
                'pluginOptions'=>['threeState'=>false],
                    'autoLabel' => true,
                    'labelSettings' => [
                        'label' => $accessibility->title,
                        'position' => CheckboxX::LABEL_RIGHT
                    ]
                ]);
            echo Html::beginTag("li");
        }
        echo Html::endTag("ul");
        
        //Accommodation Type
        echo Html::beginTag("ul",['class'=>'no-list-style']);
        echo Html::tag("H4", "Accommodation Type");
        foreach ($preferenceForm->getAccommodationTypeOptions() as $accommodationType){
            echo Html::beginTag("li");
            
            echo CheckboxX::widget([
                'name'=>'accommodationtype_' . $accommodationType->id,
                'options'=>['id'=>'accommodationtype_' . $accommodationType->id],
                'pluginOptions'=>['threeState'=>false],
                    'autoLabel' => true,
                    'labelSettings' => [
                        'label' => $accommodationType->title,
                        'position' => CheckboxX::LABEL_RIGHT
                    ]
                ]);
            echo Html::beginTag("li");
        }
        echo Html::endTag("ul");
        
        //Accommodation Type
        echo Html::beginTag("ul",['class'=>'no-list-style']);
        echo Html::tag("H4", "Board Basis");
        foreach ($preferenceForm->getBoardBasesOptions() as $boardBases){
            echo Html::beginTag("li");
            
            echo CheckboxX::widget([
                'name'=>'boardBases_' . $boardBases->id,
                'options'=>['id'=>'boardBases_' . $boardBases->id],
                'pluginOptions'=>['threeState'=>false],
                    'autoLabel' => true,
                    'labelSettings' => [
                        'label' => $boardBases->title,
                        'position' => CheckboxX::LABEL_RIGHT
                    ]
                ]);
            echo Html::beginTag("li");
        }
        echo Html::endTag("ul");
    ?>
    <?php ActiveForm::end(); ?>
    <button class="btn btn-success btn-lg col-lg-12">Submit!</button>
</div>

<div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">What kind of climates do you like?</h3>
        </div>
        <div class="panel-body">
            <?= $this->render('_interestpanel',[
                'options' => $preferenceForm->getClimateOptions(),
                'className'  => app\modules\admin\models\Climate::tableName(),
                ]); ?>
            
            
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Which accommodation features are important to you?</h3>
        </div>
        <div class="panel-body">
            <?= $this->render('_interestpanel',[
                'options' => $preferenceForm->getAccommodationFeatureOptions(),
                'className'  => app\modules\admin\models\AccommodationFeature::tableName(),
                ]); ?>
            
            
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">What activities do you like to do in your travel?</h3>
        </div>
        <div class="panel-body">
            <?= $this->render('_interestpanel',[
                'options' => $preferenceForm->getActivityOptions(),
                'className'  => app\modules\admin\models\Activity::tableName(),
                ]); ?>
           
        </div>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">What is your style in this travel?</h3>
        </div>
        <div class="panel-body">
            <?= $this->render('_interestpanel',[
                'options' => $preferenceForm->getStyleOptions(),
                'className'  => app\modules\admin\models\Style::tableName(),
                ]); ?>
            
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Which one of these videos describe your dream travel? </h3>
        </div>
        
           <div class="panel-body"> 
               <div class="row">
        <?php foreach($preferenceForm->getVideoOptions() as $video): ?>
              
        <div class="col-md-6">
            <div class="interest-video">
                <?= $video->link ?>
            </div>
        </div>
            
            <?php                endforeach; ?>
               </div>
           </div>
    </div>
</div>


