<?php
use humhub\widgets\ModalDialog;
?>

<?php ModalDialog::begin(['header' => Yii::t('DarkModeModule.base', '<strong>Dark Mode</strong> Options')]); ?>
<div class="modal-body">
    <?= Yii::t('VerifiedModule.base', 'Welcome to ' . Yii::$app->name . ' verification center, once we confirm the payment you will receive a notification stating that your account has been verified.') ?>
    <hr>
    </div>
<?php ModalDialog::end(); ?>
