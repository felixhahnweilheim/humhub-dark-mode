<?php

use humhub\widgets\ModalButton;
use humhub\widgets\modal\Modal;

?>

<?php $form = Modal::beginFormDialog([
        'footer' => ModalButton::cancel() . ' ' . ModalButton::submitModal(),
    ]); ?>
    <?= $this->render('form', ['model' => $model, 'form' => $form]); ?>
<?php Modal::endFormDialog(); ?>