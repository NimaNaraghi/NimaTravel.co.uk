<?php

namespace app\modules\supplier;

use Yii;
use yii\filters\AccessControl;
/**
 * supplier module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\supplier\controllers';
    
    public $defaultRoute = "preference";

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Yii::setAlias('@offerImages', '@app/web/images/offers/');
        Yii::setAlias('@things', '@app/web/images/things/');
    }
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    // everything else is denied
                ],
                
            ],
        ];
    }
}
