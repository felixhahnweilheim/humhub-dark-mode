<?php

namespace humhub\modules\darkMode\assets;

use humhub\modules\darkMode\models\Config;
use yii\web\AssetBundle;
use Yii;

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
    
    const PATH_CACHE = "darkMode_path";
    const FILENAME_CACHE = "darkMode_fileName";
    
    // Tell browser to use stylesheet only when in dark mode
    public $cssOptions = ['media' => 'screen and (prefers-color-scheme: dark)'];

    public function init()
    {
        parent::init();
        
        // Get Settings from Cache
        $this->sourcePath = Yii::$app->cache->get(self::PATH_CACHE);
        $this->css = [Yii::$app->cache->get(self::FILENAME_CACHE)];
        
        if (empty($this->sourcePath) || empty($this->css)) {
        
            // Find theme selected by module settings
            $config = new Config();
        
            $themeData = $config->getThemeInfos();
            $this->sourcePath = $themeData['path'];
            $this->css = [$themeData['fileName']];
            
            // Set cache
            Yii::$app->cache->set(self::PATH_CACHE, $themeData['path']);
            Yii::$app->cache->set(self::FILENAME_CACHE, $themeData['fileName']);
        }
    }
}
