<?php

namespace humhub\modules\darkMode\models;

use Yii;

/**
 * UserSetting is the model for the theme preference of guests (via cookie) and logged in users
 */
class UserSetting extends \yii\base\Model
{
    const SCENARIO_GUEST = 'guest';
    const SCENARIO_MEMBER = 'member';
    
    const OPTION_DEFAULT = 0;
    const OPTION_LIGHT = 1;
    const OPTION_DARK = 2;
    
    public $darkMode = 0;
	
	public $scenario;
    
    public function init()
    {
        parent::init();
        
        // get setting
        if ($this->scenario == self::SCENARIO_GUEST) {
            $cookies = Yii::$app->request->cookies;
            $this->darkMode = $cookies->getValue('theme', '0');
        } else {
            $settings = Yii::$app->getModule('dark-mode')->settings->user();
            $this->darkMode = $settings->get('darkMode', '0');
        }
    }
    
    public function rules()
    {
        return [
            ['darkMode', 'integer', 'min' => 0, 'max' => 2]
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
        return [
            static::OPTION_DEFAULT => Yii::t('DarkModeModule.base', 'Follow system (Default)'),
            static::OPTION_LIGHT => Yii::t('DarkModeModule.base', 'Light'),
            static::OPTION_DARK => Yii::t('DarkModeModule.base', 'Dark'),
        ];
    }
    
    public function save()
    {
        if(!$this->validate()) {
            return false;
        }
        
        // Save cookie in any case
        $cookies = Yii::$app->response->cookies;
            
        $cookies->add(new \yii\web\Cookie([
            'name' => 'theme',
            'value' => $this->darkMode,
            'expire' => time()+60*60*24*365
        ]));
        
        // Return for guests
        if ($this->scenario == self::SCENARIO_GUEST) {
            return true;
        }
        
        // Save user setting
        $settings = Yii::$app->getModule('dark-mode')->settings->user();
        
        $settings->set('darkMode', $this->darkMode);

        return true;
    }
}
