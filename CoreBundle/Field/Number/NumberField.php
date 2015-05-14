<?php


namespace GravityCMS\CoreBundle\Field\Number;

use GravityCMS\Component\Field\AbstractFieldDefinition;
use GravityCMS\Component\Field\Configuration\FieldSettingsConfiguration;
use GravityCMS\Component\Field\Display\DisplayInterface;
use GravityCMS\Component\Field\Widget\WidgetDefinitionInterface;
use GravityCMS\CoreBundle\Entity\FieldNumber;
use GravityCMS\CoreBundle\Field\Number\Configuration\NumberFieldConfiguration;
use GravityCMS\CoreBundle\Field\Number\Display\Number\NumberDisplay;
use GravityCMS\CoreBundle\Field\Number\Widget\NumberBox\NumberBoxWidget;

/**
 * Class NumberField
 *
 * @package GravityCMS\CoreBundle\Field\Number
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class NumberField extends AbstractFieldDefinition
{
    /**
     * Get the identifier name of the field. This must be a unique name and contain only alphanumeric, underscores (_)
     * and period (.) characters in the format field.<plugin>.<type>
     *
     * @return string
     */
    public function getName()
    {
        return 'number';
    }

    /**
     * A friendly text label for the field widget
     *
     * @return string
     */
    public function getLabel()
    {
        return 'Number';
    }

    /**
     * Get the description of the field
     *
     * @return string
     */
    public function getDescription()
    {
        return 'A numerical field';
    }

    /**
     * Get the entity class name for this field
     *
     * @return string
     */
    public function getEntityClass()
    {
        return 'GravityCMS\CoreBundle\Entity\FieldNumber';
    }

    /**
     * @return FieldSettingsConfiguration
     */
    public function getSettings()
    {
        return new NumberFieldConfiguration();
    }

    /**
     * @return DisplayInterface
     */
    public function getDefaultDisplay()
    {
        return new NumberDisplay();
    }

    /**
     * @return WidgetDefinitionInterface
     */
    public function getDefaultWidget()
    {
        return new NumberBoxWidget();
    }

    /**
     * Set the default value of an entity, given a configuration instance
     *
     * @param FieldNumber                $entity
     * @param FieldSettingsConfiguration $configuration
     *
     * @return void
     */
    public function setDefaults($entity, FieldSettingsConfiguration $configuration)
    {
        $entity->setNumber($configuration->getDefault());
    }
}
