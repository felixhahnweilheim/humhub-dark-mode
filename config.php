<?php

use humhub\modules\darkMode\Events;
use humhub\widgets\LayoutAddons;
use humhub\widgets\NotificationArea;
use humhub\modules\admin\models\forms\DesignSettingsForm;
use yii\base\Event;

return [
    'id' => 'dark-mode',
    'class' => 'humhub\modules\darkMode\Module',
    'namespace' => 'humhub\modules\darkMode',
    'events' => [
        ['class' => NotificationArea::class, 'event' => NotificationArea::EVENT_INIT, 'callback' => [Events::class, 'onNotificationAddonInit']],
        ['class' => LayoutAddons::class, 'event' => LayoutAddons::EVENT_INIT, 'callback' => [Events::class, 'onLayoutAddonsInit']],
        ['class' => DesignSettingsForm::class, 'event' => DesignSettingsForm::EVENT_AFTER_VALIDATE, 'callback' => [Events::class, 'onDesignSettingForm']]
    ]
];
