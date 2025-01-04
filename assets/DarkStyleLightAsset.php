<?php

namespace humhub\modules\darkMode\assets;

use humhub\modules\darkMode\assets\DarkStyleAsset;

/*
 * DarkStyleLightAsset is only used to load the dark stylesheet when we open the settings form and are in light mode
 */
class DarkStyleLightAsset extends DarkStyleAsset
{
    public $cssOptions = ['id' => 'dark-css-link', 'media' => 'none'];
}
