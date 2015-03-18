<?php

namespace GravityCMS\Component\Asset;

class AbstractAssetLibrary implements AssetLibraryInterface
{

    public function getStylesheets()
    {
        return array();
    }

    public function getJavascripts()
    {
        return array();
    }

}
