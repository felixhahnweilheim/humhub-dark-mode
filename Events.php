<?php

namespace humhub\modules\darkMode;

use humhub\modules\darkMode\widgets\SwitchButton;
use Yii;
use yii\helpers\Url;

class Events
{
    public static function onNotificationAddonInit($event)
    {
        $event->sender->addWidget(SwitchButton::class, [], ['sortOrder' => 200]);
    }
}
