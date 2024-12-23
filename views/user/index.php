<?php

use humhub\modules\ui\form\widgets\ActiveForm;
use humhub\libs\Html;

// block the button in top bar as switching theme by JS can only handle one form
$this->registerCss('.btn-group.dark-mode{cursor:not-allowed}#dark-mode-button{pointer-events:none}');

?>

<?php $this->beginContent('@user/views/account/_userSettingsLayout.php') ?>

<?php $form = ActiveForm::begin(); ?> 
    <div class="form-group">
        <?= $this->render('form', ['model' => $model, 'form' => $form]); ?>
    </div>
    <div class="form-group">
        <?= Html::saveButton(); ?>
    </div>
<?php ActiveForm::end(); ?>

<?php $this->endContent(); ?>