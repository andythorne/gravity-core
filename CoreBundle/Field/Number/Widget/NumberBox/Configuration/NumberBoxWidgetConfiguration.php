<?php


namespace GravityCMS\CoreBundle\Field\Number\Widget\NumberBox\Configuration;

use GravityCMS\Component\Field\Widget\AbstractWidgetConfiguration;

/**
 * Class NumberBoxWidgetConfiguration
 *
 * @package GravityCMS\CoreBundle\Field\Number\Widget\NumberBox\Configuration
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class NumberBoxWidgetConfiguration extends AbstractWidgetConfiguration
{
    /**
     * Get the type of the config
     *
     * @return string
     */
    public function getType()
    {
        return 'field.type.number.widget.number.configuration';
    }

    /**
     * The form name or object
     *
     * @return string|object
     */
    public function getForm()
    {
        return new NumberBoxWidgetConfigurationForm();
    }

}
