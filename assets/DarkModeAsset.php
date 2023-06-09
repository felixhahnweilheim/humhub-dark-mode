<?php

namespace humhub\modules\darkMode\assets;

use yii\web\AssetBundle;

class DarkModeAsset extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => false
    ];
    
    public $sourcePath = '@dark-mode/resources';
    
    public $js = [
        'js/darkmode.js',
    ];
}
