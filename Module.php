<?php

namespace humhub\modules\darkMode;

use humhub\modules\darkMode\assets\DarkStyleAsset;
use yii\helpers\Url;
use Yii;

class Module extends \humhub\components\Module {

    public $resourcesPath = 'resources';

    // Translatable Module Name
    public function getName() {
        return Yii::t('DarkModeModule.admin', 'Dark Mode');
    }
    // Translatable Module Description
    public function getDescription() {
        return Yii::t('DarkModeModule.admin', 'Adds a Dark Mode to HumHub');
    }
    // Link to configuration page
    public function getConfigUrl() {
        return Url::to(['/dark-mode/admin']);
    }
    
    // Remove cached settings on deactivation
    public function disable(): void
    {
        Yii::$app->cache->delete(DarkStyleAsset::PATH_CACHE);
        Yii::$app->cache->delete(DarkStyleAsset::FILENAME_CACHE);
    }
}
