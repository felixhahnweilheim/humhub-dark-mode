<?php

namespace humhub\modules\darkMode\controllers;

use humhub\modules\darkMode\models\UserSetting;
use humhub\modules\user\components\BaseAccountController;
use Yii;

class UserController extends BaseAccountController
{
    public function actionIndex()
    {
       // $form = new Config();

    //    if ($form->load(Yii::$app->request->post()) && $form->save()) {
    //        $this->view->saved();
    //    }

        return $this->render('index', /*['model' => $form]*/);
    }
}
