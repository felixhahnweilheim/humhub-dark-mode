<?php

namespace humhub\modules\darkMode\widgets;

use humhub\components\Widget;
use humhub\modules\ui\icon\widgets\Icon;

/**
 * Button for switching between dark and light mode
 */
class SwitchButton extends Widget
{
    public $icon = '';
    
    public function init()
    {
        // Always use moon icon
        $this->icon = Icon::get('moon-o');
    }
    
    public function run()
    {
        return $this->render('switchButton', [
            'icon' => $this->icon,
        ]);
    }
}
