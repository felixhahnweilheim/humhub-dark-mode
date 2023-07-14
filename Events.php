<?php

namespace humhub\modules\darkMode;

use humhub\modules\darkMode\widgets\DarkStyle;

class Events
{
    public static function onLayoutAddonsInit($event)
    {
        $event->sender->addWidget(DarkStyle::class);
    }
}
