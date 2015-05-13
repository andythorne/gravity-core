<?php


namespace GravityCMS\CoreBundle\Field\Number\Configuration;

use GravityCMS\Component\Field\Configuration\FieldSettingsConfiguration;

/**
 * Class NumberBoxWidgetConfiguration
 *
 * @package GravityCMS\CoreBundle\Field\Number\Widget\NumberBox\Configuration
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class NumberFieldConfiguration extends FieldSettingsConfiguration
{
    protected $step = 1;

    /**
     * @var int
     */
    protected $min;

    /**
     * @var int
     */
    protected $max;

    /**
     * Get the type of the config
     *
     * @return string
     */
    public function getType()
    {
        return 'field.type.number.configuration';
    }

    /**
     * The form name or object
     *
     * @return string|object
     */
    public function getForm()
    {
        return new NumberFieldConfigurationForm();
    }

    /**
     * @return int
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * @param int $step
     */
    public function setStep($step)
    {
        $this->step = $step;
    }

    /**
     * @return int
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param int $min
     */
    public function setMin($min)
    {
        $this->min = $min;
    }

    /**
     * @return int
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param int $max
     */
    public function setMax($max)
    {
        $this->max = $max;
    }
}
