<?php

namespace GravityCMS\Component\Router;

use GravityCMS\Component\Plugin\Plugin;
use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Yaml\Parser;

class AdminLoader extends Loader
{
    /**
     * All resources
     *
     * @var array[]
     */
    private $resources = array();

    /**
     * Array of app plugin paths
     *
     * @var string
     */
    private $adminPath = '/';

    /**
     * @return string
     */
    public function getAdminPath()
    {
        return $this->adminPath;
    }

    /**
     * @param string $adminPath
     */
    public function setAdminPath($adminPath)
    {
        $this->adminPath = $adminPath;
    }

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

        if($resource !== '.'){
            $pluginRoutes = new RouteCollection();
            $resourceRoutes = $this->import($resource);
            $pluginRoutes->addCollection($resourceRoutes);

            // prefix all the routes with the plugin base
            foreach ($pluginRoutes->all() as $name => $route) {
                $routes->add('gravity_cms_admin_' . $name, $route);
            }

            if($this->adminPath){
                $routes->addPrefix($this->adminPath);
            }

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
        return 'gravity_admin' === $type;
    }


}
