<?php

namespace humhub\modules\darkMode\widgets;

use humhub\components\Widget;
use humhub\modules\ui\icon\widgets\Icon;
use yii\helpers\Url;

/**
 * Button for switching between dark and light mode
 */
class SwitchButton extends Widget
{
    public $icon;
    
    public $url;
    
    public function init()
    {
        // Always use moon icon
        $this->icon = Icon::get('moon-o');
        $this->url = Url::toRoute('/dark-mode/user/modal/');
    }
    
    public function run()
    {
        return $this->render('switchButton', [
            'icon' => $this->icon,
            'url' => $this->url,
        ]);
    }
}
