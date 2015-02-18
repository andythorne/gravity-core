<?php

namespace GravityCMS\Component\Theme\Entity;

use GravityCMS\Component\Entity\Route;

/**
 * Class View
 *
 * @package GravityCMS\Component\Theme\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class View
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var Route
     */
    protected $route;

    /**
     * @var string
     */
    protected $theme;

    /**
     * @var Layout
     */
    protected $layout;
}
