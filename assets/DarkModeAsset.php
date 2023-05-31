<?php
namespace humhub\modules\darkMode\assets;

use humhub\modules\ui\view\components\View;
use Yii;
use yii\web\AssetBundle;

class DarkModeAsset extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => false
    ];
    
    public $sourcePath = '@dark-mode/resources';
    public $css = [
        'css/dark.css',
    ];
}
