<?php

namespace humhub\modules\darkMode\assets;

use humhub\components\assets\AssetBundle;
use yii\helpers\Url;
use Yii;

class SettingsAsset extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => true//todo
    ];
    
    public $sourcePath = '@dark-mode/resources/module';
    
    public $js = [
        'js/humhub.dark-mode.switch.js'
    ];
    
    public static function register($view)
    {
        $darkStyleAsset = new DarkStyleAsset();
        $am = $view->getAssetManager();
        $url = $am->publish($darkStyleAsset->sourcePath . $am->getAssetPath($darkStyleAsset, $darkStyleAsset->css[0]))[1];
        $view->registerJsConfig('dark-mode.switch', [
            'initOnAjaxUrls' => [
                Url::to(['/dark-mode/user/modal']), // Don't add any params to the URL
            ],
            'css-url' => $url
        ]);
        
        return parent::register($view);
    }
}