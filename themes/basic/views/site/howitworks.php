<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "How it works";
?>
<h1 class='ben-header'>My name is Nima Naraghi. I research to know that whether you are interested to be more like Jane or Ben.</h1>
<div class="col-md-6">
    
    <div class="col-md-8">
        <p class="ben lead">
        This is Ben<br>
        Ben browses many sources on the Internet to find a travel plan that suits him.<br>
        Ben often spends a lot of time and energy to plan his holiday<br>
        Ben finds it frustrating to choose among infinite numbers of accommodation and flight options<br> 
        Ben is confused<br>
        </p>
    </div>
    <div class="col-md-4">
        <?php echo Html::img("/web/images/ben.png",['class' => 'img img-responsive']); ?>
    </div>
</div>
<div class="col-md-6">
    <div class="col-md-8">
        <p class="ben lead">
        This is Jane<br>
        Jane registers her preferences in this website<br>
        Jane grabs a coffee and wait, or she goes to continue her life as she likes it<br>
        Travel agents, experts, and various suppliers around the globe review her interests<br> 
        Jane receives offers tailored to her interests without spending hours browsing Internet<br>
        </p>
    </div>
    <div class="col-md-4">
        <?php echo Html::img("/web/images/Jane.png",['class' => 'img img-responsive']); ?>
    </div>
</div>

<h2>How does your participation work?</h2>
<p>
<ul>
    <li>You register your preferences <a href="/user/user-home">here</a></li>
    <li> You can leave and wait for an email that lets you that your offers are ready.</li>
    <li> You will check the <a href="/user/user-home">offers</a> </li>
    <li>Finally, the survey button on the top menu will be enabled to navigate you to a survey to let us know your feedback.</li>
</ul>
</p>