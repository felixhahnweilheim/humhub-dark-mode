<?php

use humhub\widgets\modal\ModalButton;
use humhub\widgets\modal\Modal;

?>

<?php $form = Modal::beginFormDialog([
        'title' => Yii::t('DarkModeModule.base', 'Dark Mode'),
        'footer' => ModalButton::cancel() . ' ' . ModalButton::save()->submit(),
    ]); ?>
    <?= $this->render('form', ['model' => $model, 'form' => $form]); ?>
<?php Modal::endFormDialog(); ?>