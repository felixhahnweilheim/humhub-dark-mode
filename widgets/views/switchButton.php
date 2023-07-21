<?php

use humhub\modules\darkMode\assets\DarkStyleAsset;
use yii\helpers\Url;

?>
<div class="btn-group">
    <a id="dark-mode-button" href="#" data-action-click="ui.modal.load" data-action-click-url="<?= Url::toRoute('/dark-mode/user/') ?>">
        <?= $icon ?>
    </a>
</div>
