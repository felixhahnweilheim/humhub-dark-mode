<?php

namespace humhub\modules\darkMode\controllers;

use humhub\modules\darkMode\models\UserSetting;
use humhub\components\Controller;
use humhub\widgets\ModalClose;
use Yii;

class UserController extends Controller
{
    public function actionIndex()
    {
        // get scenario
		if (Yii::$app->user->isGuest) {
			$scenario = UserSetting::SCENARIO_GUEST;
		} else {
			$scenario = UserSetting::SCENARIO_MEMBER;
		}
        
        $form = new UserSetting(['scenario' => $scenario]);

        if ($form->load(Yii::$app->request->post()) && $form->save()) {
            
            // Close modal and reload page to make apply asset changes
            return ModalClose::widget(['saved' => true]) .
				' <script ' . \humhub\libs\Html::nonce() . '>$(function () { location.reload() }); </script>';
        }

        return $this->renderAjax('index', ['model' => $form]);
    }
}
