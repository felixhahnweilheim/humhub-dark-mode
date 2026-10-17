<?php

namespace humhub\modules\darkMode\controllers;

use humhub\components\access\ControllerAccess;
use humhub\modules\darkMode\models\UserSetting;
use Yii;
use yii\web\BadRequestHttpException;

class UserController extends \humhub\components\Controller
{
    public $subLayout = '@humhub/modules/user/views/account/_layout';

    /**
     * Not strict, so guests can switch the mode on public pages even if guest mode is disabled
     */
    protected $access = ControllerAccess::class;

    protected function getAccessRules()
    {
        return [
            ['login' => ['index']],
            ['post' => ['switch']],
            ['json' => ['switch']],
        ];
    }

    public function actionIndex()
    {
        $form = new UserSetting();

        if ($form->load(Yii::$app->request->post()) && $form->save()) {

            $this->view->saved();
            $this->redirect(['/dark-mode/user']);
        }

        return $this->render('index', ['model' => $form]);
    }

    /**
     * Saves the mode selected in the top bar dropdown
     */
    public function actionSwitch()
    {
        $form = new UserSetting();
        $form->darkMode = Yii::$app->request->post('mode');

        if (!$form->save()) {
            throw new BadRequestHttpException('Invalid mode.');
        }

        return ['success' => true];
    }
}
