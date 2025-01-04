<?php

namespace humhub\modules\darkMode\assets;

use humhub\modules\darkMode\models\UserSetting;
use humhub\components\assets\AssetBundle;
use yii\helpers\Url;

class SettingsAsset extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => false
    ];
    public $sourcePath = '@dark-mode/resources/module';
    
    public $js = [
        'js/humhub.dark-mode.switch.js'
    ];
    
    public static function register($view)
    {
        $mode = (new UserSetting())->darkMode;
        if ($mode === UserSetting::OPTION_LIGHT) {
            DarkStyleAsset::register($view);
        }
        $view->registerJsConfig('dark-mode.switch', [
            'initOnAjaxUrls' => [
                Url::to(['/dark-mode/user/modal']), // Don't add any params to the URL
            ]
        ]);
        
        return parent::register($view);
    }
}