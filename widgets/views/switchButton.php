<?php

use humhub\widgets\bootstrap\Button;
use humhub\helpers\Html;
use humhub\modules\ui\icon\widgets\Icon;

?>
<div class="btn-group dark-mode">
    <?= Html::a(Icon::get('moon-o'), '#', [
        'data-action-click' => 'ui.modal.load',
        'data-action-click-url' => $url,
    ]) ?>
</div>