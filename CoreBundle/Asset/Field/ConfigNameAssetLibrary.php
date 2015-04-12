<?php


namespace GravityCMS\CoreBundle\Asset\Field;

use GravityCMS\Component\Asset\AbstractAssetLibrary;

/**
 * Class ConfigNameAssetLibrary
 *
 * @package GravityCMS\CoreBundle\Asset\Field
 * @author Andy Thorne <contrabandvr@gmail.com>
 */
class ConfigNameAssetLibrary extends AbstractAssetLibrary
{
    public function getStylesheets()
    {
        return [
            '@GravityCoreBundle/fields/config-name.scss',
        ];
    }
}
