<?php

namespace humhub\modules\darkMode;

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
}
