<?php

namespace humhub\modules\darkMode\controllers;

use humhub\modules\darkMode\models\UserSetting;
use humhub\modules\user\components\BaseAccountController;
use humhub\widgets\ModalClose;
use Yii;

class UserController extends BaseAccountController
{
    public function actionIndex()
    {
        $form = new UserSetting();

        if ($form->load(Yii::$app->request->post()) && $form->save()) {
            return ModalClose::widget(['saved' => true]) .
				' <script ' . \humhub\libs\Html::nonce() . '>$(function () { location.reload() }); </script>';
        }

        return $this->renderAjax('index', ['model' => $form]);
    }
}
