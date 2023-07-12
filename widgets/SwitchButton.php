<?php

namespace humhub\modules\darkMode\widgets;

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
