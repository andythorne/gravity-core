<?php

namespace GravityCMS\Component\Asset;

/**
 * Class AbstractAssetLibrary
 *
 * @package GravityCMS\Component\Asset
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
abstract class AbstractAssetLibrary implements AssetLibraryInterface
{
    /**
     * {@inheritdoc}
     */
    public function getStylesheets()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getJavascripts()
    {
        return [];
    }
}
