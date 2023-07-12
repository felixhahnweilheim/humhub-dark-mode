<?php

use humhub\modules\darkMode\models\Config;
use humhub\modules\ui\form\widgets\ActiveForm;

?>
<div class="panel-body">
    <?php $form = ActiveForm::begin(['id' => 'configure-form']);?>

        <?= $form->field($model, 'theme')->dropdownList($model->getThemes());
        ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('base', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => '']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
