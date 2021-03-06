<?php

namespace GravityCMS\Component\Field\Widget;

use GravityCMS\Component\Asset\AssetLibraryInterface;

/**
 * Class AbstractWidgetConfiguration
 *
 * @package GravityCMS\Component\Field\Widget
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
abstract class AbstractWidget implements WidgetInterface
{
    protected $settings;

    /**
     * Get the
     *
     * @return WidgetSettingsInterface
     */
    public function getSettings()
    {
        if(!$this->settings instanceof WidgetSettingsInterface)
        {
            $this->settings = $this->getDefaultSettings();
        }

        return $this->settings;
    }

    /**
     * @return WidgetSettingsInterface
     */
    protected function getDefaultSettings()
    {
        return null;
    }

    /**
     * @return AssetLibraryInterface[]
     */
    public function getAssetLibraries()
    {
        return [];
    }

    /**
     * Set the default value of an entity
     *
     * @param object                  $entity
     * @param WidgetSettingsInterface $configuration
     *
     * @return void
     */
    public function setDefaults($entity, WidgetSettingsInterface $configuration)
    {
    }
}
