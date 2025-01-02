<?php

namespace humhub\modules\darkMode\assets;

use humhub\modules\darkMode\models\UserSetting;
use humhub\components\assets\AssetBundle;

class SettingsAsset extends AssetBundle
{
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
        
        return parent::register($view);
    }
}