<?php

namespace humhub\modules\darkMode;

use Yii;

class Module extends \humhub\components\Module {

    public $resourcesPath = 'resources';

    // Translatable Module Name
    public function getName() {
        return Yii::t('DarkModeModule.admin', 'Dark Mode for HumHub');
    }
    // Translatable Module Description
    public function getDescription() {
        return Yii::t('DarkModeModule.admin', 'Add a Dark Mode to HumHub - based on the community theme');
    }
}
