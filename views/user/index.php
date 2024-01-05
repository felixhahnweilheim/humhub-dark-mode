<?php

use humhub\modules\ui\form\widgets\ActiveForm;
use humhub\libs\Html;

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <?php $form = ActiveForm::begin(); ?> 
        <div class="panel-body">
            <?= $this->render('form', ['model' => $model, 'form' => $form]); ?>
        </div>
        <div class="modal-footer">
            <?= Html::submitButton(\Yii::t('VerifiedModule.base', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => '']); ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>