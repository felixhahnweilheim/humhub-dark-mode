<?php

namespace humhub\modules\darkMode\assets;

use humhub\modules\ui\view\helpers\ThemeHelper;
use Yii;
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
        $themeName = Yii::$app->getModule('dark-mode')->settings->get('theme', 'DarkHumHub');
        $theme = ThemeHelper::getThemeByName($themeName);
        
        $this->sourcePath = $theme->basePath;
    }
}
