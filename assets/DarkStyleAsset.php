<?php

namespace humhub\modules\darkMode\assets;

use humhub\modules\darkMode\models\Config;
use humhub\modules\ui\view\helpers\ThemeHelper;
use yii\web\AssetBundle;

/*
 * DarkStyleAsset is the default dark style, based on browser/system preference
 */

class DarkStyleAsset extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => false
    ];

    public $sourcePath = '@dark-mode/themes/DarkHumHub';

    // Tell browser to use stylesheet only when in dark mode
    public $css = [
        ['css/theme.css', 'media' => 'screen and (prefers-color-scheme: dark)'],
    ];

    public function init()
    {
        // Find theme selected by module settings
        $config = new Config();
        $theme = ThemeHelper::getThemeByName($config->theme);

        $this->sourcePath = $theme->basePath;
    }
}
