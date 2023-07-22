<?php

use humhub\modules\ui\form\widgets\ActiveForm;
use humhub\widgets\ModalButton;
use humhub\widgets\ModalDialog;

?>

<?php ModalDialog::begin(); ?>
<?php $form = ActiveForm::begin(); ?> 
<div class="modal-body">
    <?= $form->field($model, 'darkMode')->radioList($model->getOptions()); ?>
	    <?= Yii::t('DarkModeModule.base', 'Choose "Follow system" to automatically switch between light and dark mode according to your browser or system preferences.')
    ?>
</div>
<div class="modal-footer">
    <?= ModalButton::cancel() ?>
    <?= ModalButton::submitModal() ?>
</div>
<?php ActiveForm::end();?>
<?php ModalDialog::end(); ?>
