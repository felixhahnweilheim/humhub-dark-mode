<?php

namespace humhub\modules\darkMode\widgets;

use humhub\components\Widget;
use humhub\modules\darkMode\assets\DarkStyleAsset;
use humhub\modules\darkMode\assets\ForceDarkStyleAsset;
use humhub\modules\darkMode\models\UserSetting;

/**
 * Adds the dark style asset
 */
class DarkStyle extends Widget
{
    public function run()
    {
        $view = $this->getView();

        $userSettings = new UserSetting();

        // Register the right asset
        if ($userSettings->darkMode === UserSetting::OPTION_DEFAULT) {
            DarkStyleAsset::register($view);
        } elseif ($userSettings->darkMode === UserSetting::OPTION_DARK) {
            ForceDarkStyleAsset::register($view);
        }

        return '';
    }
}
