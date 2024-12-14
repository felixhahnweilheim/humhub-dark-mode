<?php

namespace humhub\modules\darkMode\controllers;

use humhub\modules\darkMode\models\UserSetting;
use humhub\widgets\ModalClose;
use Yii;

class UserController extends \humhub\components\Controller
{
    public $subLayout = '@humhub/modules/user/views/account/_layout';

    protected function getAccessRules()
    {
        return [
	    ['login' => ['index']]
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
    
    public function actionModal()
    {
        $form = new UserSetting();

        if ($form->load(Yii::$app->request->post()) && $form->save()) {

            // Close modal and reload page to make apply asset changes (this way the "Saved" message is not shown)
            return ModalClose::widget(['saved' => true]);
        }

        return $this->renderAjax('modal', ['model' => $form]);
    }
}
