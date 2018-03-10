<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "How it works";
?>
<h1 class='ben-header'>Hello! My name is Nima Naraghi. I seek to figure out whether the story below is true.</h1>
<div class="row">
    <div class="col-md-6">

        <div class="col-md-5">
            <h4> This is Ben</h4>
            <ul class=" ben">

                <li> Ben browses many sources on the Internet to plan his travel </li>
                <li> Ben often spends a lot of time and energy to plan his holiday </li>
                <li> Ben finds it frustrating to choose among infinite numbers of accommodations, flight, timings, and prices </li>
                <li> Ben is confused because planning a travel is more complicated than he expects </li>
            </ul>
            
        </div>
        <div class="col-md-7">
            <?php echo Html::img(Yii::$app->homeUrl."/images/cmen1.jpeg",['class' => 'img img-responsive']); ?>
            
        </div>
        
    </div>
    <div class="col-md-6">
        <div class="col-md-5">
            <h4> This is Jane </h4>
            <ul class="ben">
                <li> Jane registers her preferences on this website </li>
                <li> Travel agents, experts, and various suppliers around the globe review his interests </li>
                <li> Jane receives offers tailored to her interests without spending hours browsing the Internet </li>
                <li> Jane believes that it is a different experience but it completely worth it </li>
            </ul>
        </div>
        <div class="col-md-7">
            <?php echo Html::img(Yii::$app->homeUrl."/images/confident.jpg",['class' => 'img img-responsive']); ?>
            
        </div>
    </div>
</div>
<h2>Do you like to help me? Great! This is how your participation works</h2>

<ul class="ben">
    <li>You register your preferences <a href="<?= Url::to(['/user/user-home']) ?>">here</a></li>
    <li> You can leave and wait for an email that lets you that your offers are ready.</li>
    <li> You will check the <a href="<?= Url::to(['/user/user-home']) ?>">offers</a> </li>
    <li>Finally, the survey button on the top menu will be enabled to navigate you to a survey to let us know your feedback.</li>
</ul>
