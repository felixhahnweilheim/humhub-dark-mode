<?php

namespace humhub\modules\darkMode\models;

use Yii;

/**
 * UserSetting is the model for the theme preference of guests (via cookie) AND logged in users
 */
class UserSetting extends \yii\base\Model
{
    const OPTION_DEFAULT = 'default';
    const OPTION_LIGHT = 'light';
    const OPTION_DARK = 'dark';

    const SESSION_KEY_PREFIX = 'dark_mode_option';

    public $darkMode = self::OPTION_DEFAULT;

    public function init()
    {
        parent::init();

        $default = self::getDefaultMode();
        $this->darkMode = $default;

        // get setting
        if (Yii::$app->user->isGuest) {
            if (Yii::$app->session->isActive) {
                $this->darkMode = Yii::$app->session->get(self::SESSION_KEY_PREFIX, $default);
            }
        } else {
            $settings = Yii::$app->getModule('dark-mode')->settings->user();
            $this->darkMode = $settings->get('darkMode', $default);
        }
    }

    /**
     * Returns the module-wide default mode configured by the administrator,
     * used for users/guests who have not chosen a preference yet.
     *
     * @return string one of OPTION_DEFAULT, OPTION_LIGHT, OPTION_DARK
     */
    public static function getDefaultMode()
    {
        $module = Yii::$app->getModule('dark-mode');

        if (!$module) {
            return self::OPTION_DEFAULT;
        }

        return $module->settings->get('defaultMode', self::OPTION_DEFAULT);
    }

    public function rules()
    {
        return [
            ['darkMode', 'string']
        ];
    }

    public function attributeLabels()
    {
        return [
            'darkMode' => Yii::t('DarkModeModule.base', 'Theme preferences')
        ];
    }

    /**
     * Returns available options
     *
     * @return array the options
     */
    public function getOptions()
    {
        $labels = [
            static::OPTION_DEFAULT => Yii::t('DarkModeModule.base', 'Follow system'),
            static::OPTION_LIGHT => Yii::t('DarkModeModule.base', 'Light'),
            static::OPTION_DARK => Yii::t('DarkModeModule.base', 'Dark'),
        ];

        $default = self::getDefaultMode();
        $labels[$default] .= ' ' . Yii::t('DarkModeModule.base', '(Default)');

        return $labels;
    }

    public function save()
    {
        if (!$this->validate()) {
            return false;
        }

        if (Yii::$app->session->isActive) {
            Yii::$app->session->set(self::SESSION_KEY_PREFIX, $this->darkMode);
        }

        // Return for guests
        if (Yii::$app->user->isGuest) {
            return true;
        }

        // Save user setting
        $settings = Yii::$app->getModule('dark-mode')->settings->user();
        $settings->set('darkMode', $this->darkMode);

        return true;
    }
}
