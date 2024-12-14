<?php
\humhub\modules\darkMode\assets\SettingsAsset::register($this);
?>
<?= $form->field($model, 'darkMode')->radioList($model->getOptions()); ?>
<?= Yii::t('DarkModeModule.base', 'Choose "Follow system" to automatically switch between light and dark mode according to your browser or system preferences.') ?>