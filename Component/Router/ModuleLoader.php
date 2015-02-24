<?php

namespace GravityCMS\Component\Router;

use GravityCMS\Component\Module\Module;
use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Yaml\Parser;

class ModuleLoader extends Loader
{
    /**
     * All resources
     *
     * @var array[]
     */
    private $resources = array();

    /**
     * Array of app module paths
     *
     * @var Module[]
     */
    private $modules = array();

    /**
     * Add a resource to the stack
     *
     * @param string $resource
     * @param Module $module
     *
     * @internal param $name
     */
    public function addPluginResource(Module $module, $resource)
    {
        $this->resources[$module->getName()][] = $resource;
        $this->modules[$module->getName()] = $module;
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

        foreach($this->resources as $moduleName => $routeResources)
        {
            $module = $this->modules[$moduleName];
            $moduleRoutes = new RouteCollection();
            foreach($routeResources as $routeResource)
            {
                $resourceRoutes = $this->import($routeResource);
                $moduleRoutes->addCollection($resourceRoutes);
            }

            $moduleRoutes->addPrefix('/' . $moduleName);

            // prefix all the routes with the module base
            foreach($moduleRoutes->all() as $name => $route)
            {
                $defaultController = $route->getDefault('_controller');
                list($controller, $method) = explode(':', $defaultController);
                $controller = $module->getNamespace().'\\Controller\\'.$controller.'Controller';
                $route->setDefault('_controller', $controller.'::'.$method.'Action');
                $routes->add('gravity_module_' . $moduleName . '_' . $name, $route);
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
        return 'gravity_module' === $type;
    }


}
