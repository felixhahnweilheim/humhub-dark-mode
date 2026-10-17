<?php

namespace humhub\modules\darkMode\assets;

use humhub\components\assets\AssetBundle;

class SettingsAsset extends AssetBundle
{
    public $sourcePath = '@dark-mode/resources/module';
    
    public $js = [
        'js/humhub.dark-mode.switch.min.js'
    ];
}
