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
            'isActive' => (Yii::$app->controller->module
                    && Yii::$app->controller->module->id === 'dark-mode'
                    && Yii::$app->controller->id === 'user'),
        ]));

        return true;
    } 
}
