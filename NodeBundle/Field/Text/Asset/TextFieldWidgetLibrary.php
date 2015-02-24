<?php

namespace GravityCMS\NodeBundle\Field\Text\Asset;

use GravityCMS\Component\Asset\AbstractAssetLibrary;

class TextFieldWidgetLibrary extends AbstractAssetLibrary
{
    public function getJavascripts()
    {
        return array(
            '@node/field/text/text.js',
        );
    }

}
