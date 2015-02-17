<?php

namespace GravityCMS\NodeBundle\Router;

/**
 * Class RoutingProvider
 *
 * @package GravityCMS\NodeBundle\Router
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
interface RoutingProviderInterface
{
    /**
     * Get the route
     *
     * @return string
     */
    public function getRoute();
} 
