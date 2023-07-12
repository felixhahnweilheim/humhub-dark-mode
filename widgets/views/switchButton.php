<?php

use humhub\modules\darkMode\assets\DarkModeAsset;
use humhub\modules\darkMode\assets\DarkStyleAsset;

DarkStyleAsset::register($this);

?>
<div class="btn-group">
    <a href="#" id="switch-button" class="currently-<?= $mode ?>">
        <?= $icon ?>
    </a>
</div>
