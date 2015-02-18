<?php

namespace GravityCMS\NodeBundle\Configuration\Field\View\Display;

use GravityCMS\Component\Configuration\AbstractConfiguration;

/**
 * Class AbstractDisplayConfiguration
 *
 * @package GravityCMS\NodeBundle\Configuration\Field\View\Display
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
abstract class AbstractDisplayConfiguration extends AbstractConfiguration
{
    /**
     * Get the supported field
     *
     * @return string
     */
    abstract public function getSupportedField();

    /**
     * @return string
     */
    abstract public function getViewFormClass();
} 
