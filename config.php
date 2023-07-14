<?php

use yii\base\Event;
use humhub\widgets\LayoutAddons;
use humhub\modules\darkMode\Events;

return [
    'id' => 'dark-mode',
    'class' => 'humhub\modules\darkMode\Module',
    'namespace' => 'humhub\modules\darkMode',
    'events' => [
        ['class' => LayoutAddons::class, 'event' => LayoutAddons::EVENT_INIT, 'callback' => [Events::class, 'onLayoutAddonsInit']],
    ]
];
