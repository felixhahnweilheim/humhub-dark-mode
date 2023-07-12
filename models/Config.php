<?php

namespace humhub\modules\darkMode\models;

use humhub\libs\DynamicConfig;
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
        
        DynamicConfig::rewrite();

        return true;
    }
}
