<?php

namespace humhub\modules\darkMode\assets;

use humhub\modules\darkMode\assets\DarkStyleAsset;

/*
 * DarkStyleLightAsset is used to load the dark stylesheet in light mode - with media=none
 * We load it so we can easily switch between modes via JavaScript
 */
class DarkStyleLightAsset extends DarkStyleAsset
{
    public $cssOptions = ['id' => 'dark-css-link', 'media' => 'none'];
}
