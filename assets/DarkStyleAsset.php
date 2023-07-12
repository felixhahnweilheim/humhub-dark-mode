<?php

namespace humhub\modules\darkMode\assets;

use yii\web\AssetBundle;

class DarkStyleAsset extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => false
    ];

    $themeName = Yii::app->getModule('dark-mode')->get('theme', 'DarkHumHub');
    $theme = ThemeHelper::getThemeByName($themeName);
    
    public $sourcePath = $theme->basePath;
    
    public $css = [
        'css/theme.css',
    ];
}
