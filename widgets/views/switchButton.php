<?php

use humhub\helpers\Html;
use humhub\modules\ui\icon\widgets\Icon;

/* @var $url string */
/* @var $options array */
/* @var $current string */
/* @var $icons array */

?>
<div class="btn-group dark-mode">
    <?= Html::a(Icon::get('moon-o'), '#', [
        'data-bs-toggle' => 'dropdown',
        'aria-expanded' => 'false',
        'aria-label' => Yii::t('DarkModeModule.base', 'Dark Mode'),
    ]) ?>
    <ul class="dropdown-menu dropdown-menu-end">
        <?php foreach ($options as $mode => $label) : ?>
            <li>
                <?= Html::a(Icon::get($icons[$mode])->fixedWith() . ' ' . Html::encode($label), '#', [
                    'class' => ['dropdown-item', $mode === $current ? 'active' : ''],
                    'data-action-click' => 'dark-mode.switch.switchMode',
                    'data-action-url' => $url,
                    'data-mode' => $mode,
                ]) ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
