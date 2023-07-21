<?php

use humhub\modules\ui\form\widgets\ActiveForm;
use humhub\widgets\ModalButton;
use humhub\widgets\ModalDialog;

?>

<?php ModalDialog::begin(['header' => Yii::t('DarkModeModule.base', '<strong>Dark Mode</strong> Options')]); ?>
<?php $form = ActiveForm::begin(); ?> 
<div class="modal-body">
    <?= $form->field($model, 'darkMode')->radioList($model->getOptions()); ?>
</div>
<div class="modal-footer">
    <?= ModalButton::cancel() ?>
    <?= ModalButton::submitModal() ?>
</div>
<?php ActiveForm::end();?>
<?php ModalDialog::end(); ?>
