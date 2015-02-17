<?php

namespace GravityCMS\NodeBundle\Configuration\Field\View\Form;

/**
 * Interface FormConfigurationInterface
 *
 * @package GravityCMS\NodeBundle\Configuration
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
interface FormConfigurationInterface
{
    /**
     * Get the supported field
     *
     * @return string
     */
    public function getSupportedField();

    /**
     * @return string
     */
    public function getViewFormClass();

    /**
     * @return string
     */
    public function getViewName();
}
