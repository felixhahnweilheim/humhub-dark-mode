<?php

namespace humhub\modules\darkMode\assets;

use humhub\modules\darkMode\models\UserSetting;
use humhub\components\assets\AssetBundle;

class DarkModeAsset extends AssetBundle
{
    public $sourcePath = '@dark-mode/resources/module';

    public $js = [
        'js/humhub.dark-mode.min.js'
    ];

    public $publishOptions = [
	    'position' => \yii\web\View::POS_HEAD,
    ];

    public $defer = false;

    public $async = false;

    public static function register($view)
    {
        $view->registerJsConfig('dark-mode', [
            'mode' => (new UserSetting())->darkMode,
        ]);
        
        return parent::register($view);
    }
}
