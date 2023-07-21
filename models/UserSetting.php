<?php

namespace humhub\modules\darkMode\models;

use Yii;

/**
 * UserSetting is the model for the user dark mode setting
 */
class UserSetting extends \yii\base\Model
{
    const OPTION_DEFAULT = 0;
    const OPTION_LIGHT = 1;
    const OPTION_DARK = 2;
    
    public $darkMode = 0;
    
    public function init()
    {
        parent::init();

        $settings = Yii::$app->getModule('dark-mode')->settings->user();

        $this->darkMode = $settings->get('darkMode', '0');
    }
    
    public function rules()
    {
        return [
            ['darkMode', 'integer', 'min' => 0, 'max' => 2]
        ];
    }
    
    /**
     * Returns available options
     *
     * @return array the options
     */
    public function getOptions()
    {
        return [
            static::OPTION_DEFAULT => Yii::t('DarkModeModule.base', 'Use Browser Mode'),
            static::OPTION_LIGHT => Yii::t('DarkModeModule.base', 'Light Mode'),
            static::OPTION_DARK => Yii::t('DarkModeModule.base', 'Dark Mode'),
        ];
    }
    
    public function save()
    {
        if(!$this->validate()) {
            return false;
        }
        
        $settings = Yii::$app->getModule('dark-mode')->settings->user();
        
        $settings->set('darkMode', $this->darkMode);

        return true;
    }
}
