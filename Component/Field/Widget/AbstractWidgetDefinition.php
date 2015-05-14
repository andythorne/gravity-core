<?php

namespace GravityCMS\Component\Field\Widget;

use GravityCMS\Component\Asset\AssetLibraryInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AbstractWidgetDefinition
 *
 * @package GravityCMS\Component\Field\Widget
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
abstract class AbstractWidgetDefinition implements WidgetDefinitionInterface
{
    /**
     * @return AssetLibraryInterface[]
     */
    public function getAssetLibraries()
    {
        return [];
    }

    /**
     * @param OptionsResolver $optionsResolver
     *
     * @return void
     */
    public function setOptions(OptionsResolver $optionsResolver)
    {
    }
}
