<?php

namespace humhub\modules\darkMode\assets;

use yii\web\AssetBundle;

class DarkStyleAsset extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => false
    ];
    
    public $sourcePath = '@dark-mode/resources';
    
    public $css = [
        'css/dark.css',
    ];
}
