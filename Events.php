<?php

namespace humhub\modules\darkMode;

use humhub\modules\darkMode\widgets\DarkStyle;
use humhub\modules\darkMode\widgets\SwitchButton;
use humhub\modules\darkMode\models\Config;
use humhub\components\ModuleEvent;
use humhub\modules\ui\menu\MenuLink;
use Yii;
use yii\helpers\Url;

class Events
{
    public static function onLayoutAddonsInit($event)
    {
        $event->sender->addWidget(DarkStyle::class);
    }
    
    public static function onNotificationAddonInit($event)
    {
        if (Yii::$app->getModule('dark-mode')->settings->get('showButton', true)) {
            try {
                $event->sender->addWidget(SwitchButton::class, [], ['sortOrder' => 200]);
            } catch (\Throwable $e) {
                Yii::error($e, 'dark-mode');
            }
        }
    }
    
    public static function onAccountSettingsMenuInit($event)
	{
	    $menu = $event->sender;
        
	    $menu->addEntry(new MenuLink([
	        'icon' => 'fa-moon-o',
	        'label' => Yii::t('DarkModeModule.base', 'Dark Mode'),
	        'url' => Url::toRoute('/dark-mode/user/'),
	        'sortOrder' => 900,
        ]));

        return true;
    }
    
    public static function onDesignSettingForm($event)
    {
        $oldTheme = Yii::$app->view->theme->name;
        $newTheme = $event->sender->theme;

        // Clear dark theme setting if base theme has changed
        if ($oldTheme !== $newTheme) {
        
            $config = new Config();
            $config->theme = '';
            $config->save();
        }
    }
    
    public static function onAfterModuleEnabled(ModuleEvent $event)
    {
        if ($event->moduleId == 'enterprise-theme' || $event->moduleId == 'clean-theme') {
            $settings = Yii::$app->getModule('dark-mode')->settings;
            $settings->delete('theme');
            Yii::warning('Note: Your dark theme setting was removed because you activated "' . $event->moduleId . '".', 'dark-mode');
        }
    }

    public static function onBeforeModuleDisabled(ModuleEvent $event)
    {
        $settings = Yii::$app->getModule('dark-mode')->settings;
        $darkTheme = $settings->get('theme');
        
        // If Enterprise was disabled, remove "DarkEnterprise" setting
        if ($event->moduleId == 'enterprise-theme' && $darkTheme == 'DarkEnterprise') {
            $settings->delete('theme');
            Yii::warning('Note: Your dark theme setting was removed. "enterprise (dark)" is no longer available because you disabled the Enterprise Theme Module.', 'dark-mode');
        }
    }    
}
