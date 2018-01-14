<?php
//use \Yii;
/* @var $this yii\web\View */
/* @var $user common\models\User */


?>
<?= Yii::t('app','Hello') . ' ' . $user ?>,


<p><?= Yii::t('app','Thank you very much for your payment!') ?></p>
    
<p><?= Yii::t('app','Your payment details is as follow: ') ?></p>


<?php
foreach ($model->attributes as $key => $value)
{
    if(array_search($value, ['first_name','last_name','amount', 'created_at','id']))
        echo '<p>' . $model->attributeLabels[$key] . ': '. $value . '</p>'; 
}

?>