<?php


namespace GravityCMS\Component\Field\Widget;

use GravityCMS\Component\Configuration\AbstractConfiguration;

/**
 * Class AbstractWidgetConfiguration
 *
 * @package GravityCMS\Component\Field\Widget
 * @author Andy Thorne <contrabandvr@gmail.com>
 */
abstract class AbstractWidgetConfiguration extends AbstractConfiguration implements WidgetSettingsInterface
{
    protected $default;

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param mixed $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }
}
