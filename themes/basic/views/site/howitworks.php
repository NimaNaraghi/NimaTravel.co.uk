<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "How it works";
?>
<h1 class='ben-header'>Hello! My name is Nima Naraghi. I research to figure out whether the story below is true.</h1>
<div class="row">
    <div class="col-md-6">

        <div class="col-md-5">
            <h4> This is Mr. Incredible before using this website</h4>
            <ul class=" ben">

                <li> Mr. Incredible browses many sources on the Internet to plan his travel </li>
                <li> Mr. Incredible often spends a lot of time and energy to plan his holiday </li>
                <li> Mr. Incredible finds it frustrating to choose among infinite numbers of accommodation and flight options </li> 
                <li> Despite all the efforts, the travels are not satisfactory eventually </li>
                <li> Mr. Incredible is confused because planning a travel is more complicated than he expects </li>
            </ul>
            
        </div>
        <div class="col-md-7">
            <?php echo Html::img(Yii::$app->homeUrl."/images/mr1.jpg",['class' => 'img img-responsive']); ?>
            <?php echo Html::img(Yii::$app->homeUrl."/images/mr2.jpg",['class' => 'img img-responsive']); ?>
        </div>
        
    </div>
    <div class="col-md-6">
        <div class="col-md-5">
            <h4> Mr. Incredible after using this website </h4>
            <ul class=" ben">

                <li> Mr. Incredible register his preferences </li>
                <li> Mr. Incredible spend more time with his family </li>
                <li> Travel agents, experts, and various suppliers around the globe review his interests </li>
                <li> Mr. Incredible receives offers tailored to his interests without spending hours browsing the Internet </li>
                <li> The travel goes as he expected  </li>
            </ul>
        </div>
        <div class="col-md-7">
            <?php echo Html::img(Yii::$app->homeUrl."/images/mr6.jpg",['class' => 'img img-responsive']); ?>
            <?php echo Html::img(Yii::$app->homeUrl."/images/mr4.jpg",['class' => 'img img-responsive']); ?>
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
