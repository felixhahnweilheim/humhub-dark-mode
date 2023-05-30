<?php

namespace humhub\modules\darkMode;

use humhub\modules\ui\view\helpers\ThemeHelper;
use humhub\libs\DynamicConfig;
use Yii;
use yii\helpers\Url;

class Module extends \humhub\components\Module {

    public $resourcesPath = 'resources';

    const THEME_NAME = 'dark-mode';

    // Translatable Module Description
    public function getDescription() {
        return Yii::t('DarkModeModule.admin', 'Dark Mode for HumHub');
    }

    // Module Activation
    public function enable() {
        if (parent::enable()) {
            $this->enableTheme();
            return true;
        }
        return false;
    }

    private function enableTheme() {

        // see https://community.humhub.com/s/module-development/wiki/Theme+Modules
        // Already a theme based theme is active
        foreach (ThemeHelper::getThemeTree(Yii::$app->view->theme) as $theme) {
            if ($theme->name === self::THEME_NAME) {
                return;
            }
        }

        $theme = ThemeHelper::getThemeByName(self::THEME_NAME);
        if ($theme !== null) {
            $theme->activate();
            DynamicConfig::rewrite();
        }
    }

    // Module Deactivation
    public function disable() {
        $this->disableTheme();
        parent::disable();
    }

    // see https://community.humhub.com/s/module-development/wiki/Theme+Modules
    private function disableTheme() {
        foreach (ThemeHelper::getThemeTree(Yii::$app->view->theme) as $theme) {
            if ($theme->name === self::THEME_NAME) {
                $theme = ThemeHelper::getThemeByName('HumHub');
                $theme->activate();
                break;
            }
        }
    }
}
