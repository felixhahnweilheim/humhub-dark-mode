<?php

use humhub\modules\ui\form\widgets\ActiveForm;
use humhub\widgets\ModalButton;
use humhub\widgets\ModalDialog;

?>

<?php ModalDialog::begin(); ?>
<?php $form = ActiveForm::begin(); ?> 
<div class="modal-body">
    <?= $this->render('form', ['model' => $model, 'form' => $form]); ?>
</div>
<div class="modal-footer">
    <?= ModalButton::cancel() ?>
    <?= ModalButton::submitModal() ?>
</div>
<?php ActiveForm::end(); ?>
<?php ModalDialog::end(); ?>