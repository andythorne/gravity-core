<?php


namespace GravityCMS\CoreBundle\Field\Number\Widget\NumberBox;

use GravityCMS\Component\Field\FieldInterface;
use GravityCMS\Component\Field\Widget\AbstractWidget;
use GravityCMS\Component\Field\Widget\WidgetSettingsInterface;
use GravityCMS\CoreBundle\Entity\FieldNumber;
use GravityCMS\CoreBundle\Field\Number\Widget\NumberBox\Configuration\NumberBoxWidgetConfiguration;
use Symfony\Component\Form\AbstractType;

/**
 * Class NumberBoxWidget
 *
 * @package GravityCMS\CoreBundle\Field\Number\Widget\NumberBox
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class NumberBoxWidget extends AbstractWidget
{
    /**
     * Get the identifier name of the field widget. This must be a unique name and contain only alphanumeric,
     * underscores (_) and period (.) characters in the format field.widget.<plugin>.<type>
     *
     * @return string
     */
    public function getName()
    {
        return 'number.number_box';
    }

    /**
     * A friendly text label for the field widget
     *
     * @return string
     */
    public function getLabel()
    {
        return 'Number Box';
    }

    /**
     * Get the description of the field widget
     *
     * @return string
     */
    public function getDescription()
    {
        return 'A numeric input box';
    }

    /**
     * Get the form type for this widget
     *
     * @return AbstractType
     */
    public function getForm()
    {
        return new NumberBoxWidgetForm();
    }

    /**
     * Get the settings
     *
     * @return WidgetSettingsInterface
     */
    public function getSettings()
    {
        return new NumberBoxWidgetConfiguration();
    }

    /**
     * Checks if this widget supports the given field
     *
     * @param FieldInterface $field
     *
     * @return string
     */
    public function supportsField(FieldInterface $field)
    {
        return $field->getName() == 'number';
    }

    /**
     * @param FieldNumber             $entity
     * @param WidgetSettingsInterface $configuration
     */
    public function setDefaults($entity, WidgetSettingsInterface $configuration)
    {
        $entity->setNumber($configuration->getDefault());
    }
}
