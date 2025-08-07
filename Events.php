<?php

namespace humhub\modules\darkMode;

use humhub\modules\darkMode\widgets\SwitchButton;
use humhub\modules\darkMode\models\UserSetting;
use humhub\modules\ui\menu\MenuLink;
use humhub\components\View;
use Yii;
use yii\helpers\Url;

class Events
{
    public static function onViewBeginBody($event)
    {
        if (
            Yii::$app->request->isConsoleRequest
            || Yii::$app->request->isAjax
        ) {
            return;
        }

        $mode = (new UserSetting())->darkMode;

        if ($mode === UserSetting::OPTION_DARK) {
            Yii::$app->view->registerJs("
            (function() {
                $('html').attr('data-bs-theme', 'dark');
            })();
            ", View::POS_HEAD);
        } elseif ($mode === UserSetting::OPTION_DEFAULT) {
            Yii::$app->view->registerJs("
            (function() {
                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    $('html').attr('data-bs-theme', 'dark');
                    $('html').attr('data-dark-mode-default', true);
                }
                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (!$('html').attr('data-dark-mode-default') || $('html').attr('data-dark-mode-default') == 'false') return;
                    if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                        $('html').attr('data-bs-theme', 'dark');
                    } else {
                        $('html').attr('data-bs-theme', 'light');
                    }
                });
            })();
            ", View::POS_HEAD);
        }
    }
    
    public static function onNotificationAddonInit($event)
    {
        if (Yii::$app->getModule('dark-mode')->settings->get('showButton', true)) {
            try {
                $event->sender->addWidget(SwitchButton::class, [], ['sortOrder' => 200]);
            } catch (\Throwable $e) {
                Yii::error($e, 'dark-mode');
            }
        }
    }
    
    public static function onAccountSettingsMenuInit($event)
    {
        $menu = $event->sender;
        
        $menu->addEntry(new MenuLink([
        'icon' => 'fa-moon-o',
            'label' => Yii::t('DarkModeModule.base', 'Dark Mode'),
            'url' => Url::toRoute('/dark-mode/user/'),
            'sortOrder' => 900,
            'isActive' => (Yii::$app->controller->module
                    && Yii::$app->controller->module->id === 'dark-mode'
                    && Yii::$app->controller->id === 'user'),
        ]));

        return true;
    } 
}
