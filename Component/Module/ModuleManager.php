<?php

namespace GravityCMS\Component\Module;

/**
 * Class ModuleManager
 *
 * @package GravityCMS\Component\Module
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class ModuleManager
{
    /**
     * @var Module[]
     */
    protected $modules = array();

    /**
     * @return mixed
     */
    public function getModules()
    {
        return $this->modules;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function getModule($name)
    {
        return $this->modules[$name];
    }

    public function addModule(Module $module)
    {
        $this->modules[] = $module;
    }

    /**
     * @param Module[] $modules
     */
    public function setModules(array $modules)
    {
        foreach($modules as $module){
            $this->addModule($module);
        }
    }
}
