<?php

namespace humhub\modules\darkMode\models;

use humhub\modules\darkMode\Module;
use humhub\modules\ui\view\helpers\ThemeHelper;
use Yii;

/**
 * Module Configuration model
 */
class Config extends \yii\base\Model
{
    public $theme;
    
    public $hasDarkCSS = false;
    
    public function init()
    {
        parent::init();

        $settings = Yii::$app->getModule('dark-mode')->settings;

        $this->theme = $settings->get('theme');
        
        // If no setting was found, try to get it from known theme combinations - leave empty if no theme combination was found
        if (empty($this->theme)) {
            if (!empty(Module::getThemeCombinations()[Yii::$app->view->theme->name])) {
                $this->theme = Module::getThemeCombinations()[Yii::$app->view->theme->name];
            }
        }
        
        if (strpos($this->theme, '-dark.css') !== false) {
            $this->hasDarkCSS = true;
        }
    }

    public function rules()
    {
        return [
            ['theme', 'in', 'range' => array_keys($this->getThemes())],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'theme' => Yii::t('DarkModeModule.admin', 'Dark Theme')
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
        $darkMessage = Yii::t('DarkModeModule.admin', 'dark');
        $themes = [];
        
        foreach (ThemeHelper::getThemes() as $theme) {
            // Themes with a dark.css
            if (file_exists($theme->basePath . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'dark.css')) {
                $themes[$theme->name . '-dark.css'] = $theme->name . ' (' . $darkMessage . ')';
            // Themes containing "dark" in their name
            } elseif (stripos($theme->name, 'dark') !== false) {
                $themes[$theme->name] = $theme->name;
            }
        }
        
        // Rename "DarkHumHub" to "HumHub (dark)"
        $themes['DarkHumHub'] = 'HumHub (' . $darkMessage . ')';
        
        // Add "enterprise (dark)" if module enabled
        $enterprise = 'enterprise-theme';
        if (Yii::$app->hasModule($enterprise) && isset(Yii::$app->modules[$enterprise])) {
            $themes['DarkEnterprise'] = 'enterprise (' . $darkMessage . ')';
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
    
    public function getThemePath()
    {
        if ($this->theme == 'DarkEnterprise') {
            return '@dark-mode' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'DarkEnterprise';
        } else {
            if ($this->hasDarkCSS) {
                $this->theme = str_replace('-dark.css', '', $this->theme);
            }
            return ThemeHelper::getThemeByName($this->theme)->basePath;
        }  
    }
}
