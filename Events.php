<?php

namespace humhub\modules\darkMode;

use humhub\modules\darkMode\widgets\DarkStyle;
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
}
