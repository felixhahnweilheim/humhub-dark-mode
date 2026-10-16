<?php

namespace humhub\modules\darkMode\widgets;

use humhub\components\Widget;
use humhub\modules\darkMode\assets\SettingsAsset;
use humhub\modules\darkMode\models\UserSetting;
use yii\helpers\Url;

/**
 * Dropdown for switching between dark and light mode
 */
class SwitchButton extends Widget
{
    public function run()
    {
        SettingsAsset::register($this->view);

        $model = new UserSetting();

        return $this->render('switchButton', [
            'url' => Url::to(['/dark-mode/user/switch']),
            'options' => $model->getOptions(),
            'current' => $model->darkMode,
            'icons' => [
                UserSetting::OPTION_DEFAULT => 'desktop',
                UserSetting::OPTION_LIGHT => 'sun-o',
                UserSetting::OPTION_DARK => 'moon-o',
            ],
        ]);
    }
}
