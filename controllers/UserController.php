<?php

namespace humhub\modules\darkMode\controllers;

use humhub\modules\darkMode\models\UserSetting;
use humhub\widgets\ModalClose;
use Yii;

class UserController extends \humhub\components\Controller
{
    public function actionIndex()
    {
        $form = new UserSetting();

        if ($form->load(Yii::$app->request->post()) && $form->save()) {
            return ModalClose::widget(['saved' => true, 'reload' => 'true']);
        }

        return $this->renderAjax('index', ['model' => $form]);
    }
}
