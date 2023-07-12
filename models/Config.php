<?php

namespace humhub\modules\darkMode\models;

use humhub\modules\ui\view\helpers\ThemeHelper;
use Yii;

/**
 * ConfigureForm defines the configurable fields.
 */
class Config extends \yii\base\Model
{
    public $theme;
    
    public function init()
    {
        parent::init();

        $settings = Yii::$app->getModule('dark-mode')->settings;

        $this->theme = $settings->get('theme', 'DarkHumHub');
    }

    public function rules()
    {
        return [
            ['theme', 'in', 'range' => $this->getThemes()],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'theme' => Yii::t('DarkModeModule.admin', 'Theme')
        ];
    }
    
    public function attributeHints()
    {
        return [
            'theme' => Yii::t('DarkModeModule.admin', 'The stylesheet of the selected theme will be used for the dark mode.')
        ];
    }
    
    public function getThemes()
    {
        $themes = [];
        
        foreach (ThemeHelper::getThemes() as $theme) {
            $themes[$theme->name] = $theme->name;
        }
        
        return $themes;
    }
    
    public function save()
    {
        if(!$this->validate()) {
            return false;
        }

        $settings = Yii::$app->getModule('dark-mode')->settings;
        
        $settings->set('theme', $this->theme);

        return true;
    }
}
