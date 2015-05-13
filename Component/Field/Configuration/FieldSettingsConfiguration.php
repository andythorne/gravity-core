<?php

namespace GravityCMS\Component\Field\Configuration;

use GravityCMS\Component\Configuration\AbstractConfiguration;
use GravityCMS\Component\Field\FieldSettingsInterface;

/**
 * Class FieldConfiguration
 *
 * @package GravityCMS\Component\Field\Configuration
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
abstract class FieldSettingsConfiguration extends AbstractConfiguration implements FieldSettingsInterface
{
    const LIMIT_UNLIMITED = -1;

    protected $limit = 1;

    protected $required = true;

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return boolean
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * @param boolean $required
     */
    public function setRequired($required)
    {
        $this->required = $required;
    }
} 
