<?php

namespace GravityCMS\NodeBundle\Field\Text\Asset;

use GravityCMS\Component\Asset\AbstractAssetLibrary;

class TextFieldWidgetLibrary extends AbstractAssetLibrary
{
    public function getJavascripts()
    {
        return array(
            '@GravityCMSNodeBundle/field/text/text.js',
        );
    }

}
