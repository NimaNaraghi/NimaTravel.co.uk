<?php

namespace app\modules\admin;
use Yii;
/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    public $layout = '@app/modules/admin/views/layouts/main.php';
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Yii::setAlias('@preferenceImages', '@app/web/images/preferences/');
    }
}
