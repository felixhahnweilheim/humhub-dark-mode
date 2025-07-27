<?php

use humhub\widgets\bootstrap\Button;
use humhub\widgets\form\ActiveForm;

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <?= Yii::t('DarkModeModule.admin', '<strong>Dark Mode</strong> module configuration') ?>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(['id' => 'configure-form']);?>

            <?= $form->field($model, 'showButton')->checkbox(); ?>

        <div class="mb-3">
            <?= Button::primary()->save()->submit() ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
