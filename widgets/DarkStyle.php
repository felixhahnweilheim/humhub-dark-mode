<?php

namespace humhub\modules\darkMode\widgets;

use humhub\components\Widget;
use humhub\modules\darkMode\assets\DarkStyleAsset;
use humhub\modules\darkMode\assets\ForceDarkStyleAsset;
use humhub\modules\darkMode\assets\DarkStyleLightAsset;
use humhub\modules\darkMode\models\UserSetting;
use Yii;

/**
 * Adds the dark style asset
 */
class DarkStyle extends Widget
{
    public function run()
    {
        $view = $this->getView();

        $userSettings = new UserSetting();

        // Try to register the right asset
        try {
            if ($userSettings->darkMode === UserSetting::OPTION_DEFAULT) {
                DarkStyleAsset::register($view);
            } elseif ($userSettings->darkMode === UserSetting::OPTION_DARK) {
                ForceDarkStyleAsset::register($view);
            } else {
                DarkStyleLightAsset::register($view);
            }
        } catch (\Throwable $e) {
            Yii::error('Stylesheet for Dark Mode could not be loaded. Please check the module configuration! You probably have to select a dark theme. 
                Full error:
                ' . $e, 'dark-mode');
        }

        return '';
    }
}
