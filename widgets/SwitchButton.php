<?php

namespace humhub\modules\darkMode\widgets;

use humhub\components\Widget;
use humhub\modules\ui\icon\widgets\Icon;

/**
 * Button for switching between dark and light mode
 */
class SwitchButton extends Widget
{
    public $mode = 'light';
    
    public $icon = '';
    
    public function init()
    {
        if(!empty($_COOKIE['theme'])) {
	        $this->mode = $_COOKIE['theme'];
        }
        if($this->mode == 'dark') {
            $this->icon = Icon::get('sun-o');
        } else {
            $this->icon= Icon::get('moon-o');
        }
    }
    
    public function run()
    {
        return $this->render('switchButton', [
            'mode' => $this->mode,
            'icon' => $this->icon,
        ]);
    }
}
