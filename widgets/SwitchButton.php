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
    public $url;
    
    public function init()
    {
        $this->url = Url::toRoute('/dark-mode/user/modal/');
    }
    
    public function run()
    {
        return $this->render('switchButton', [
            'url' => $this->url,
        ]);
    }
}
