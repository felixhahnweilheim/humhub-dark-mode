<?php

namespace humhub\modules\darkMode\widgets;

use humhub\components\Widget;

/**
 * Button for switching between dark and light mode
 */
class SwitchButton extends Widget
{
    public function run()
    {
        return $this->render('switchButton');
    }
}
