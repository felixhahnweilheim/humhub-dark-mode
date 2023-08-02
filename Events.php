<?php

namespace humhub\modules\darkMode;

use humhub\modules\darkMode\widgets\DarkStyle;
use humhub\modules\darkMode\Module;
use humhub\modules\darkMode\widgets\SwitchButton;
use humhub\components\ModuleEvent;
use Yii;

class Events
{
    public static function onLayoutAddonsInit($event)
    {
        $event->sender->addWidget(DarkStyle::class);
    }
    
    public static function onNotificationAddonInit($event)
    {
        try {
            $event->sender->addWidget(SwitchButton::class, [], ['sortOrder' => 200]);
        } catch (\Throwable $e) {
            Yii::error($e);
        }
    }
    
    public static function onDesignSettingForm($event)
    {
        $oldTheme = Yii::$app->view->theme->name;
        $newTheme = $event->sender->theme;
        
        // Do nothing if theme has not changed
        if ($oldTheme == $newTheme) {
            return;
        }
        
        // Update Dark Theme for known Themes
        if (!empty(Module::getThemeCombinations()[$newTheme])) {
            
            $settings = Yii::$app->getModule('dark-mode')->settings;
            $settings->set('theme', Module::getThemeCombinations()[$newTheme]);
            return;
        } else {
            // Delete module setting if no known theme was found to prevent design issues with non matching themes
            $settings = Yii::$app->getModule('dark-mode')->settings;
            $settings->delete('theme');
        }
    }
    
    public function onAfterModuleEnabled(ModuleEvent $event) {
        // If module ID contains "theme" we assume it is a theme module
        if(strpos($event->moduleId, 'theme')) {
            // Delete module setting to prevent design issues
            $settings = Yii::$app->getModule('dark-mode')->settings;
            $settings->delete('theme');
        }
    }       
}
