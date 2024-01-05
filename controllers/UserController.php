<?php

namespace humhub\modules\darkMode\controllers;

use humhub\modules\darkMode\models\UserSetting;
use humhub\widgets\ModalClose;
use Yii;

class UserController extends \humhub\modules\user\controllers\AccountController
{
    public function actionIndex()
    {
        $form = new UserSetting();

        if ($form->load(Yii::$app->request->post()) && $form->save()) {

            $this->view->saved();
            $this->redirect(['/dark-mode/user']);
        }

        return $this->render('index', ['model' => $form]);
    }
    
    public function actionModal()
    {
        $form = new UserSetting();

        if ($form->load(Yii::$app->request->post()) && $form->save()) {

            // Close modal and reload page to make apply asset changes (this way the "Saved" message is not shown)
            return ModalClose::widget(['saved' => true]) .
                ' <script ' . \humhub\libs\Html::nonce() . '>$(function () { location.reload() }); </script>';
        }

        return $this->renderAjax('modal', ['model' => $form]);
    }
}
