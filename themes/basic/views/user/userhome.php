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
use \yii\helpers\StringHelper;

$this->title = Yii::t('app', 'Home');
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="col-md-3">
    
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
       
        echo $this->render('_interesttextpanel',[
            'header' => "Accommodation Type",
            'form' => $preferenceForm->formName(),
            'options' => $preferenceForm->getAccommodationTypeOptions(),
        ]);
        
        echo $this->render('_interesttextpanel',[
            'header' => "Board Basis",
            'form' => $preferenceForm->formName(),
            'options' => $preferenceForm->getBoardBasesOptions(),
        ]);
        
        echo $this->render('_interesttextpanel',[
            'header' => "Accessibility",
            'form' => $preferenceForm->formName(),
            'options' => $preferenceForm->getAccessibilitiesOptions(),
        ]);
        
    ?>
    
</div>

<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">What kind of climates do you like?</h3>
        </div>
        <div class="panel-body">
            <?= $this->render('_interestimagepanel',[
                'options' => $preferenceForm->getClimateOptions(),
                'form'  => $preferenceForm->formName(),
                ]); ?>
            
            
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Which accommodation features are important to you?</h3>
        </div>
        <div class="panel-body">
            <?= $this->render('_interestimagepanel',[
                'options' => $preferenceForm->getAccommodationFeatureOptions(),
                'form'  => $preferenceForm->formName(),
                ]); ?>
            
            
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">What activities do you like to do in your travel?</h3>
        </div>
        <div class="panel-body">
            <?= $this->render('_interestimagepanel',[
                'options' => $preferenceForm->getActivityOptions(),
                'form'  => $preferenceForm->formName(),
                ]); ?>
           
        </div>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">What is your style in this travel?</h3>
        </div>
        <div class="panel-body">
            <?= $this->render('_interestimagepanel',[
                'options' => $preferenceForm->getStyleOptions(),
                'form'  => $preferenceForm->formName(),
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
                <?php
                    echo CheckboxX::widget([
                        'name' => $preferenceForm->formName() . '[' . $video->formName() . '][]',
                        'options' => ['id' => $preferenceForm->formName() . '-' . $video->formName() . '-' . $video->id],
                        'pluginOptions' => ['threeState' => false],
                        'autoLabel' => true,
                        'labelSettings' => [
                            'label' => '<h3>' . $video->title . '</h3>',
                            'position' => CheckboxX::LABEL_RIGHT
                        ]
                    ]);
                ?>
            </div>
        </div>
            
            <?php                endforeach; ?>
               </div>
           </div>
    </div>
</div>
<button class="btn btn-success btn-lg col-lg-12">Submit!</button>
<?php ActiveForm::end(); ?>
    

