<?php

namespace humhub\modules\darkMode\assets;

use humhub\modules\darkMode\assets\DarkStyleAsset;

/*
 * ForceDarkStyleAsset adds the dark stylesheet, not regarding browser/system preferences
 * It should only be registered within try and catch because it throws an error when no theme is found
 */
class ForceDarkStyleAsset extends DarkStyleAsset
{
    public $cssOptions = ['media' => 'screen'];
}
