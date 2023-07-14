<?php

namespace humhub\modules\darkMode\assets;

use humhub\modules\ui\view\helpers\ThemeHelper;
use Yii;
use yii\web\AssetBundle;

class DarkStyleAsset extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => false
    ];

    public $sourcePath = '@dark-mode/themes/DarkHumHub';
    
    public $css = [
        ['css/theme.css', 'media' => 'screen and (prefers-color-scheme: dark)'],
    ];
    
    public function init()
    {
        $themeName = Yii::$app->getModule('dark-mode')->settings->get('theme', 'DarkHumHub');
        $theme = ThemeHelper::getThemeByName($themeName);
        
        $this->sourcePath = $theme->basePath;
    }
}
