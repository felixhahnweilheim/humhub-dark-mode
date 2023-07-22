<?php

namespace humhub\modules\darkMode\widgets;

use humhub\modules\darkMode\models\UserSetting;
use humhub\modules\darkMode\assets\DarkStyleAsset;
use humhub\modules\darkMode\assets\ForceDarkStyleAsset;
use humhub\components\Widget;

use Yii;

/**
 * Adds the dark style asset
 */
class DarkStyle extends Widget
{
    public function run()
    {
        $view = $this->getView();
        $user = Yii::$app->user;
        
        if ($user->isGuest) {
            DarkStyleAsset::register($view);
            return;
        }
        
        $mode = Yii::$app->getModule('dark-mode')->settings->user()->get('darkMode', '0');
        
        if ($mode == UserSetting::OPTION_DEFAULT) {
            DarkStyleAsset::register($view);
        } elseif ($mode == UserSetting::OPTION_DARK) {
            ForceDarkStyleAsset::register($view);
        }

        return '';
    }
}
