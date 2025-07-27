<?php

namespace humhub\modules\darkMode\assets;

use humhub\components\assets\AssetBundle;
use yii\helpers\Url;

class SettingsAsset extends AssetBundle
{
    public $sourcePath = '@dark-mode/resources/module';
    
    public $js = [
        'js/humhub.dark-mode.switch.min.js'
    ];

    public $depends = [
        'humhub\modules\darkMode\assets\DarkModeAsset',
    ];
    
    public static function register($view)
    {
        $view->registerJsConfig('dark-mode.switch', [
            'initOnAjaxUrls' => [
                Url::to(['/dark-mode/user/modal']), // Don't add any params to the URL
            ]
        ]);
        
        return parent::register($view);
    }
}