<?php

namespace humhub\modules\darkMode\controllers;

use humhub\modules\darkMode\models\Config;
use Yii;

class AdminController extends \humhub\modules\admin\components\Controller
{
    public function actionIndex()
    {
        $form = new Config();

        if ($form->load(Yii::$app->request->post()) && $form->save()) {
            $this->view->saved();
        }

        return $this->render('index', ['model' => $form]);
    }
}
