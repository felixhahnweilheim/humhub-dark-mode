<?php

use humhub\modules\ui\icon\widgets\Icon;
use humhub\modules\darkMode\assets\DarkModeAsset;
use humhub\modules\darkMode\assets\DarkStyleAsset;

DarkModeAsset::register($this);

$mode = 'light';

if(!empty($_COOKIE['theme'])) {
	$mode = $_COOKIE['theme'];
}

if ($mode == 'dark') {
    DarkStyleAsset::register($this);
    $icon = Icon::get('sun-o');
} else {
    $icon = Icon::get('moon-o');
}
?>
<div class="btn-group">
    <a href="#" id="switch-button" class="currently-<?= $mode ?>">
        <?= $icon ?>
    </a>
</div>