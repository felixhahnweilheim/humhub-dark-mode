<?php

use humhub\modules\darkMode\assets\DarkModeAsset;
use humhub\modules\darkMode\assets\DarkStyleAsset;

DarkModeAsset::register($this);

if ($mode == 'dark') {
    DarkStyleAsset::register($this);
}
?>
<div class="btn-group">
    <a href="#" id="switch-button" class="currently-<?= $mode ?>">
        <?= $icon ?>
    </a>
</div>