<?php


namespace GravityCMS\CoreBundle\Field\Number\Widget\NumberBox;

use GravityCMS\Component\Field\FieldDefinitionInterface;
use GravityCMS\Component\Field\Widget\AbstractWidgetDefinition;
use GravityCMS\CoreBundle\Entity\FieldNumber;
use GravityCMS\CoreBundle\Field\Number\Widget\NumberBox\Configuration\NumberBoxWidgetConfiguration;
use Symfony\Component\Form\AbstractType;

/**
 * Class NumberBoxWidget
 *
 * @package GravityCMS\CoreBundle\Field\Number\Widget\NumberBox
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class NumberBoxWidget extends AbstractWidgetDefinition
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
     * Checks if this widget supports the given field
     *
     * @param FieldDefinitionInterface $field
     *
     * @return string
     */
    public function supportsField(FieldDefinitionInterface $field)
    {
        return $field->getName() == 'number';
    }
}
