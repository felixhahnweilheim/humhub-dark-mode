<?php

use humhub\widgets\ModalButton;
use humhub\widgets\modal\Modal;

?>

<?php $form = Modal::beginFormDialog([
        'title' => Yii::t('DarkModeModule.base', 'Dark Mode'),
        'footer' => ModalButton::cancel() . ' ' . ModalButton::submitModal(),
    ]); ?>
    <?= $this->render('form', ['model' => $model, 'form' => $form]); ?>
<?php Modal::endFormDialog(); ?>