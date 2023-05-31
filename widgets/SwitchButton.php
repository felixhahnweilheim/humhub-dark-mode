<?php
namespace humhub\modules\darkMode\widgets;

use humhub\components\Widget;

/**
 * Button for switching between dark and light mode
 */
class SwitchButton extends Widget
{
    /**
     * Creates the Wall Widget
     */
    public function run()
    {
        return $this->render('switchButton');
    }
}
