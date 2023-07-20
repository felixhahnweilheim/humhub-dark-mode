<?php

use humhub\modules\darkMode\models\Config;
use humhub\modules\ui\form\widgets\ActiveForm;
use yii\helpers\Html;

?>

<div class="panel pabel-default">
    <div class="panel-heading">
        <?= \Yii::t('DarkModeModule.base', '<strong>Dark Mode</strong> module configuration') ?>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(['id' => 'configure-form']);?>

            <?= $form->field($model, 'theme')->dropdownList($model->getThemes());
            ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('base', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => '']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
