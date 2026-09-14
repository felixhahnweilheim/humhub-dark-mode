<?php

namespace humhub\modules\darkMode\models;

use humhub\modules\darkMode\models\UserSetting;
use Yii;

/**
 * Module Configuration model
 */
class Config extends \yii\base\Model
{
    const DARK_CSS_SUFFIX = ' (dark)';
    const FALLBACK = 'DarkHumHub';

    public $showButton = true;
    public $defaultMode = UserSetting::OPTION_DEFAULT;

    public function init()
    {
        parent::init();

        $module = Yii::$app->getModule('dark-mode');
        // make sure module is enabled before retrieving settings, see https://github.com/felixhahnweilheim/humhub-dark-mode/issues/48
        if ($module) {
            $this->showButton = $module->settings->get('showButton', $this->showButton);
            $this->defaultMode = $module->settings->get('defaultMode', $this->defaultMode);
        }

    }

    public function rules()
    {
        return [
            ['showButton', 'boolean'],
            ['defaultMode', 'in', 'range' => [UserSetting::OPTION_DEFAULT, UserSetting::OPTION_LIGHT, UserSetting::OPTION_DARK]],
        ];
    }

    public function attributeLabels()
    {
        return [
            'showButton' => Yii::t('DarkModeModule.admin', 'Show Button in Top Bar'),
            'defaultMode' => Yii::t('DarkModeModule.admin', 'Default Mode'),
        ];
    }

    public function attributeHints()
    {
        return [
            'showButton' => Yii::t('DarkModeModule.admin', 'Users can set their theme preferences also in Account Settings > General.'),
            'defaultMode' => Yii::t('DarkModeModule.admin', 'The mode used for users and guests who have not chosen a preference of their own yet.'),
        ];
    }

    /**
     * Returns the selectable default mode options
     *
     * @return array the options
     */
    public function getDefaultModeOptions()
    {
        return [
            UserSetting::OPTION_DEFAULT => Yii::t('DarkModeModule.admin', 'Follow system'),
            UserSetting::OPTION_LIGHT => Yii::t('DarkModeModule.admin', 'Light'),
            UserSetting::OPTION_DARK => Yii::t('DarkModeModule.admin', 'Dark'),
        ];
    }

    public function save()
    {
        if (!$this->validate()) {
            return false;
        }

        $settings = Yii::$app->getModule('dark-mode')->settings;
        $settings->set('showButton', $this->showButton);
        $settings->set('defaultMode', $this->defaultMode);

        return true;
    }
}
