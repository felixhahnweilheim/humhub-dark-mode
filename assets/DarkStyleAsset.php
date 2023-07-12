<?php

namespace humhub\modules\darkMode\assets;

use yii\web\AssetBundle;

class DarkStyleAsset extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => false
    ];
    
    public $sourcePath = '@dark-mode/themes/DarkHumHub';
    
    public $css = [
        ['css/theme.css', 'screen' => 'screen and (prefers-color-scheme: dark)'],
    ];
}
