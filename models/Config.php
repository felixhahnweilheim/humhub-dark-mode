<?php

namespace humhub\modules\darkMode\models;

use Yii;

/**
 * Module Configuration model
 */
class Config extends \yii\base\Model
{
    const DARK_CSS_SUFFIX = ' (dark)';
    const FALLBACK = 'DarkHumHub';

    public $showButton = true;

    public function init()
    {
        parent::init();

        $module = Yii::$app->getModule('dark-mode');
        // make sure module is enabled before retrieving settings, see https://github.com/felixhahnweilheim/humhub-dark-mode/issues/48
        if ($module) {
            $this->showButton = $module->settings->get('showButton', $this->showButton);
        }

    }

    public function rules()
    {
        return [
            ['showButton', 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'showButton' => Yii::t('DarkModeModule.admin', 'Show Button in Top Bar')
        ];
    }

    public function attributeHints()
    {
        return [
            'showButton' => Yii::t('DarkModeModule.admin', 'Users can set their theme preferences also in Account Settings > General.')
        ];
    }

    public function save()
    {
        if (!$this->validate()) {
            return false;
        }

        $settings = Yii::$app->getModule('dark-mode')->settings;
        $settings->set('showButton', $this->showButton);

        return true;
    }
}
