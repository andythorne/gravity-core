<?php


namespace GravityCMS\CoreBundle\Field\Number\Display\Number;

use GravityCMS\Component\Field\Display\AbstractDisplay;
use GravityCMS\Component\Field\Display\DisplaySettingsInterface;
use GravityCMS\CoreBundle\Field\Number\Display\Number\Configuration\NumberDisplayConfiguration;

/**
 * Class NumberDisplay
 *
 * @package GravityCMS\CoreBundle\Field\Number\Display\Number
 * @author Andy Thorne <contrabandvr@gmail.com>
 */
class NumberDisplay extends AbstractDisplay
{
    /**
     * Get the identifier name of the field widget. This must be a unique name and contain only alphanumeric,
     * underscores (_) and period (.) characters in the format field.widget.<plugin>.<type>
     *
     * @return string
     */
    public function getName()
    {
        return 'number.number';
    }

    /**
     * A friendly text label for the field widget
     *
     * @return string
     */
    public function getLabel()
    {
        return 'Number field display';
    }

    /**
     * Get the description of the field widget
     *
     * @return string
     */
    public function getDescription()
    {
        return 'Output a number as html display';
    }

    /**
     * @return DisplaySettingsInterface
     */
    protected function getDefaultSettings()
    {
        return new NumberDisplayConfiguration();
    }

}
