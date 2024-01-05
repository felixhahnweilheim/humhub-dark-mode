<?php

use humhub\modules\ui\form\widgets\ActiveForm;
use humhub\libs\Html;

?>

<?php $this->beginContent('@user/views/account/_userSettingsLayout.php') ?>

<?php $form = ActiveForm::begin(); ?> 
    <div>
            <?= $this->render('form', ['model' => $model, 'form' => $form]); ?>
        </div>
        <div>
            <?= Html::submitButton(\Yii::t('VerifiedModule.base', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => '']); ?>
        </div>
<?php ActiveForm::end(); ?>

<?php $this->endContent(); ?>