<?php

namespace humhub\modules\darkMode\assets;

use humhub\modules\darkMode\models\Config;
use yii\web\AssetBundle;

/*
 * DarkStyleAsset is the default dark style, based on browser/system preference
 * It should only be registered within try and catch because it throws an error when no theme is found
 */
class DarkStyleAsset extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => false
    ];
    
    public $sourcePath;
    
    public $css;
    
    // Tell browser to use stylesheet only when in dark mode
    public $cssOptions = ['media' => 'screen and (prefers-color-scheme: dark)'];

    public function init()
    {
        parent::init();
        
        // Find theme selected by module settings
        $config = new Config();
        
        $themeData = $config->getThemeInfos();
        $this->sourcePath = $themeData['path'];
        $this->css = [$themeData['fileName']];
    }
}
