<?php

use humhub\modules\ui\form\widgets\ActiveForm;
use humhub\modules\ui\icon\widgets\Icon;
use yii\helpers\Html;

$baseTheme = Yii::$app->view->theme->name;

$githubSponsor = 'https://github.com/sponsors/felixhahnweilheim';
$repository = 'https://github.com/felixhahnweilheim/humhub-dark-mode';
$guideLink = 'https://felixwebdesign.de/en/humhub/docs/dark-mode/';
$externalIcon = Icon::get('external-link') . ' ';
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <?= Yii::t('DarkModeModule.admin', '<strong>Dark Mode</strong> module configuration') ?>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(['id' => 'configure-form']);?>

            <?= $form->field($model, 'showButton')->checkbox(); ?>
            <?= $form->field($model, 'theme')->dropdownList($model->getThemes()); ?>
            <p><?= Icon::get('info-circle') . ' ' . Yii::t('DarkModeModule.admin', 'Current base theme: ') . $baseTheme ?></p>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('base', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => '']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <div style="margin-bottom: 10px">
            <?= Html::a($externalIcon . Yii::t('DarkModeModule.admin', 'Guide for Administrators'), $guideLink,  ['class' => 'btn btn-sm btn-info', 'target' => '_blank']) ?>
        </div>
        <div style="margin: 10px 0">
            <?= Html::a($externalIcon . Yii::t('DarkModeModule.admin', 'Donate'), $githubSponsor,  ['class' => 'btn btn-sm btn-info', 'target' => '_blank']) ?>
        </div>
        <div style="margin-top: 10px 0">
            <?= Html::a($externalIcon . Yii::t('DarkModeModule.admin', 'GitHub Repository'), $repository, ['class' => 'btn btn-sm btn-default', 'target' => '_blank']) ?>
        </div>
    </div>
</div>
