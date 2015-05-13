<?php

namespace GravityCMS\Component\Field\Widget;

use GravityCMS\Component\Configuration\ConfigurationInterface;

/**
 * Interface WidgetSettingsInterface
 *
 * @package GravityCMS\Component\Field\Widget
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
interface WidgetSettingsInterface extends ConfigurationInterface
{
    /**
     * @return mixed
     */
    public function getDefault();

    /**
     * @param mixed $default
     */
    public function setDefault($default);
}
