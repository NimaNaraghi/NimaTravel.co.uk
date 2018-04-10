<?php
use yii\helpers\Html;
//use \Yii;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $user common\models\User */


?>
<div >
    

Dear Participant,<br>
The travel suppliers sent you their offers after reviewing your preferences. Please, find the offers by following the link below:
<p><?= Html::a("http://nimatravel.co.uk/user/offers",Url::to(['/user/offers'],true)) ?></p>
<p>
Please remember to take the survey before leaving the website by clicking on the red button visible on the top right corner of the website. <br>
Thank you so much for your participation!<br>
</p>

Sincerely,<br>
Nima Naraghi<br>
MSc Student in Web and Mobile Development<br>
University of the West of Scotland<br>

    
   
    
    
</div>
