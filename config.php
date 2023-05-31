<?php

use yii\base\Event;
use humhub\widgets\NotificationArea;
use humhub\modules\darkMode\Events;

return [
    'id' => 'dark-mode',
    'class' => 'humhub\modules\darkMode\Module',
    'namespace' => 'humhub\modules\darkMode',
    'events' => [
        ['class' => NotificationArea::class, 'event' => NotificationArea::EVENT_INIT, 'callback' => [Events::class, 'onNotificationAddonInit']],
    ]
];
