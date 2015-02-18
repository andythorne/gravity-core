<?php

namespace GravityCMS\Component\Router;

use GravityCMS\Component\Plugin\Plugin;
use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Yaml\Parser;

class ApiLoader extends Loader
{
    /**
     * Load all resources into the router
     *
     * @param mixed $resource
     * @param null  $type
     *
     * @return RouteCollection
     */
    public function load($resource, $type = null)
    {
        $routes = new RouteCollection();

        if($resource === '.') {

        } else {
            $pluginRoutes = new RouteCollection();
            $resourceRoutes = $this->import($resource, 'rest');
            $pluginRoutes->addCollection($resourceRoutes);

            //$pluginRoutes->addPrefix('/core');

            // prefix all the routes with the plugin base
            foreach ($pluginRoutes->all() as $name => $route) {
                $routes->add('gravity_api_' . $name, $route);
            }

            $routes->addPrefix('/api');
        }

        return $routes;
    }

    /**
     * @param mixed $resource
     * @param null  $type
     *
     * @return bool
     */
    public function supports($resource, $type = null)
    {
        return 'gravity_api' === $type;
    }


}
