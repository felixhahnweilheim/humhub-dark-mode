<?php

use humhub\modules\ui\form\widgets\ActiveForm;
use yii\helpers\Html;

$baseTheme = Yii::$app->view->theme->name;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <?= Yii::t('DarkModeModule.admin', '<strong>Dark Mode</strong> module configuration') ?>
    </div>
    <div class="panel-body">
        <div class="alert alert-info">
        <p>
            <?= Yii::t('DarkModeModule.admin', 'Current base theme: ') . $baseTheme ?>
        </p>
        </div>
        <?php $form = ActiveForm::begin(['id' => 'configure-form']);?>

            <?= $form->field($model, 'theme')->dropdownList($model->getThemes()); ?>
            <?= $form->field($model, 'showButton')->checkbox(); ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('base', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => '']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
