<?php

namespace humhub\modules\darkMode\assets;

use humhub\modules\ui\helpers\ThemeHelper;
use Yii;
use yii\web\AssetBundle;

class DarkStyleAsset extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => false
    ];

    public $sourcesPath = '@dark-mode/themes/DarkHumHub';
    
    public $css = [
        'css/theme.css',
    ];
    
    public function init()
    {
        $themeName = Yii::app->getModule('dark-mode')->get('theme', 'DarkHumHub');
        $theme = ThemeHelper::getThemeByName($themeName);
        
        $this->sourcesPath = $theme->basePath;
    }
}
