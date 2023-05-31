<?php
use humhub\modules\ui\icon\widgets\Icon;
use humhub\modules\darkMode\assets\DarkModeAsset;
DarkModeAsset::register($this);
?>
TEST
<div class="btn-group">
    <a href="#" id="switch-button"><?= Icon::get('moon-o') ?></i></a>
</div>