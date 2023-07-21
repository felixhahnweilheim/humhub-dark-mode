<?php

use humhub\modules\darkMode\assets\DarkStyleAsset;
use yii\helpers\Url;

if ($mode == 'dark') {
    DarkStyleAsset::register($this);
}
?>
<div class="btn-group">
    <a id="dark-mode-button" href="#" data-action-click="ui.modal.load" data-action-click-url="<?= Url::toRoute('/dark-mode/user/') ?>" class="currently-<?= $mode ?>">
        <?= $icon ?>
    </a>
</div>
