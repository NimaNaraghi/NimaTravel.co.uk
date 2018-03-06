<?php
namespace app\assets;

class MapAsset extends \yii\web\AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
         "js/googlemaps.js",
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyA_G5pyTCT7Pg1CTwOsI-kjW4iRacqRyXY&callback=initMap',
       
       // 'js/gmaps.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',

        //'airani\bootstrap\BootstrapRtlAsset',
    ];
}
