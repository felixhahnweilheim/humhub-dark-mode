<?php

namespace humhub\modules\darkMode;

use humhub\modules\darkMode\widgets\DarkStyle;
use humhub\modules\darkMode\Module;
use humhub\modules\darkMode\widgets\SwitchButton;
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
        }
    }
}
