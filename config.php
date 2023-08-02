<?php

use humhub\modules\darkMode\Events;
use humhub\widgets\LayoutAddons;
use humhub\widgets\NotificationArea;
use humhub\components\ModuleManager;
use yii\base\Event;

return [
    'id' => 'dark-mode',
    'class' => 'humhub\modules\darkMode\Module',
    'namespace' => 'humhub\modules\darkMode',
    'events' => [
        ['class' => NotificationArea::class, 'event' => NotificationArea::EVENT_INIT, 'callback' => [Events::class, 'onNotificationAddonInit']],
        ['class' => LayoutAddons::class, 'event' => LayoutAddons::EVENT_INIT, 'callback' => [Events::class, 'onLayoutAddonsInit']],
        ['class' => ModuleManager::class, 'event' => ModuleManager::EVENT_AFTER_MODULE_ENABLE, 'callback' => [Events::class, 'onAfterModuleEnabled']],
        ['class' => ModuleManager::class, 'event' => ModuleManager::EVENT_BEFORE_MODULE_DISABLE, 'callback' => [Events::class, 'onBeforeModuleDisabled']]
    ]
];
