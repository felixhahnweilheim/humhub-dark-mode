<?php

namespace humhub\modules\darkMode;

use Yii;

class Module extends \humhub\components\Module {

    public $resourcesPath = 'resources';

    // Translatable Module Description
    public function getDescription() {
        return Yii::t('DarkModeModule.admin', 'Dark Mode for HumHub');
    }
}
