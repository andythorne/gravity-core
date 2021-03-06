<?php

namespace GravityCMS\Component\Field\Widget;

use GravityCMS\Component\Asset\AssetLibraryInterface;
use GravityCMS\Component\Field\FieldInterface;
use Symfony\Component\Form\AbstractType;

/**
 * Interface WidgetInterface
 *
 * @package GravityCMS\Component\Field\Widget
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
interface WidgetInterface
{
    /**
     * Get the identifier name of the field widget. This must be a unique name and contain only alphanumeric,
     * underscores (_) and period (.) characters in the format field.widget.<plugin>.<type>
     *
     * @return string
     */
    public function getName();

    /**
     * A friendly text label for the field widget
     *
     * @return string
     */
    public function getLabel();

    /**
     * Get the description of the field widget
     *
     * @return string
     */
    public function getDescription();

    /**
     * Get the form type for this widget
     *
     * @return AbstractType
     */
    public function getForm();

    /**
     * Get the settings
     *
     * @return WidgetSettingsInterface
     */
    public function getSettings();

    /**
     * Get a list of asset libraries to use
     *
     * @return AssetLibraryInterface[]
     */
    public function getAssetLibraries();

    /**
     * Checks if this widget supports the given field
     *
     * @param FieldInterface $field
     *
     * @return string
     */
    public function supportsField(FieldInterface $field);

    /**
     * Set the default value of an entity
     *
     * @param object                  $entity
     * @param WidgetSettingsInterface $configuration
     *
     * @return void
     */
    public function setDefaults($entity, WidgetSettingsInterface $configuration);
}
