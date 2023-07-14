<?php

namespace humhub\modules\darkMode\widgets;

use humhub\modules\darkMode\assets\DarkStyleAsset;
use humhub\components\Widget;

/**
 * Adds the dark style asset
 */
class DarkStyle extends Widget
{
    public function run()
    {
        $view = $this->getView();
        DarkStyleAsset::register($view);

        return '';
    }
}
