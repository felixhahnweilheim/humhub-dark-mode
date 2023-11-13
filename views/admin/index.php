<?php

use humhub\modules\ui\form\widgets\ActiveForm;
use humhub\modules\ui\icon\widgets\Icon;
use yii\helpers\Html;

$baseTheme = Yii::$app->view->theme->name;

$githubProfile = 'https://github.com/felixhahnweilheim';
$githubSponsor = 'https://github.com/sponsors/felixhahnweilheim';
$repository = 'https://github.com/felixhahnweilheim/humhub-dark-mode';
$repositoryName = 'felixhahnweilheim/humhub-dark-mode';
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
        <p>
            <?= Yii::t('DarkModeModule.admin', 'The Dark Mode module has been developed and is maintained by {name}.', ['name' => 'Felix Hahn']) ?> &nbsp;
            <?= Html::a($externalIcon . Yii::t('DarkModeModule.admin', 'Github account'), $githubProfile,  ['target' => '_blank']) ?>
        </p>
        <p>
            <?= Html::a($externalIcon . Yii::t('DarkModeModule.admin', 'Donate'), $githubSponsor,  ['class' => 'btn btn-info', 'target' => '_blank']) ?> &nbsp;
            <?= Yii::t('DarkModeModule.admin', 'Thank you!') ?>
        </p>
        <p>
            <?= Yii::t('DarkModeModule.admin', 'Github Repository:') ?> &nbsp;
            <?= Html::a($externalIcon . $repositoryName, $repository,  ['target' => '_blank']) ?>
        </p>
    </div>
</div>
