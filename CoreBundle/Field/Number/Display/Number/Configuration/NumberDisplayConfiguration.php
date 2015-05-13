<?php


namespace GravityCMS\CoreBundle\Field\Number\Display\Number\Configuration;

use GravityCMS\Component\Configuration\AbstractConfiguration;
use GravityCMS\Component\Field\Display\DisplaySettingsInterface;

/**
 * Class NumberDisplayConfiguration
 *
 * @package GravityCMS\CoreBundle\Field\Number\Display\Number\Configuration
 * @author Andy Thorne <contrabandvr@gmail.com>
 */
class NumberDisplayConfiguration extends AbstractConfiguration implements DisplaySettingsInterface
{
    /**
     * Get the type of the config
     *
     * @return string
     */
    public function getType()
    {
        return 'field.type.number.display.number';
    }

    /**
     * The form name or object
     *
     * @return string|object
     */
    public function getForm()
    {
        return new NumberDisplayConfigurationForm();
    }

}
