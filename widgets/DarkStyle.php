<?php

namespace humhub\modules\darkMode\widgets;

use humhub\components\Widget;
use humhub\modules\darkMode\assets\DarkModeAsset;

/**
 * Adds the dark style asset
 */
class DarkStyle extends Widget
{
    public function run()
    {
        DarkModeAsset::register($this->getView());
        return '';
    }
}
