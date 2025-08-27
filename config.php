<?php

use humhub\modules\darkMode\Events;
use humhub\widgets\NotificationArea;
use humhub\modules\user\widgets\AccountSettingsMenu;
use humhub\components\View;

return [
    'id' => 'dark-mode',
    'class' => 'humhub\modules\darkMode\Module',
    'namespace' => 'humhub\modules\darkMode',
    'events' => [
        ['class' => View::class, 'event' => View::EVENT_BEGIN_BODY, 'callback' => [Events::class, 'onViewBeginBody'],],
        ['class' => NotificationArea::class, 'event' => NotificationArea::EVENT_INIT, 'callback' => [Events::class, 'onNotificationAddonInit']],
        ['class' => AccountSettingsMenu::class, 'event' => AccountSettingsMenu::EVENT_INIT, 'callback' => [Events::class, 'onAccountSettingsMenuInit']]
    ]
];
