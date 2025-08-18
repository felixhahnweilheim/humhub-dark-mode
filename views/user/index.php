<?php

use humhub\widgets\form\ActiveForm;
use humhub\widgets\bootstrap\Button;

// block the button in top bar as switching theme by JS can only handle one form
$this->registerCss('.btn-group.dark-mode{cursor:not-allowed}#dark-mode-button{pointer-events:none}');

?>

<?php $this->beginContent('@user/views/account/_userSettingsLayout.php') ?>

<?php $form = ActiveForm::begin(); ?> 
    <div class="mb-3">
        <?= $this->render('form', ['model' => $model, 'form' => $form]); ?>
    </div>
    <div class="mb-3">
        <?= Button::save()->submit() ?>
    </div>
<?php ActiveForm::end(); ?>

<?php $this->endContent(); ?>