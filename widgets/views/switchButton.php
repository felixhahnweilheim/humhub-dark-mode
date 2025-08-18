<?php

use humhub\widgets\bootstrap\Button;

?>
<div class="btn-group dark-mode">
    <?= Button::asLink()
        ->icon('moon-o')
        ->action('ui.modal.load', $url) ?>
</div>