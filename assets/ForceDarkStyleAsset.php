<?php

namespace humhub\modules\darkMode\assets;

use humhub\modules\darkMode\models\Config;
use humhub\modules\ui\view\helpers\ThemeHelper;
use yii\web\AssetBundle;

/**ForceDarkStyleAsset adds the dark stylesheet, not regarding browser/system preferences
 */
class ForceDarkStyleAsset extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => false
    ];

    public $sourcePath = '@dark-mode/themes/DarkHumHub';

    public $css = ['css/theme.css'];

    public function init()
    {
        // Find theme selected by module settings
        $config = new Config();
        $theme = ThemeHelper::getThemeByName($config->theme);

        $this->sourcePath = $theme->basePath;
    }
}
