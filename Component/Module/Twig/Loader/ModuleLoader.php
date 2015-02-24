<?php

namespace GravityCMS\Component\Module\Twig\Loader;

use GravityCMS\Component\Module\Module;
use Symfony\Bundle\TwigBundle\Loader\FilesystemLoader;
use Symfony\Component\Config\FileLocatorInterface;
use Symfony\Component\Templating\TemplateNameParserInterface;

class ModuleLoader extends FilesystemLoader
{

    /**
     * @param FileLocatorInterface        $locator
     * @param TemplateNameParserInterface $parser
     */
    function __construct(FileLocatorInterface $locator, TemplateNameParserInterface $parser)
    {
        parent::__construct($locator, $parser);
    }

    /**
     * Add a module to the loader
     *
     * @param Module $module
     */
    public function addModule(Module $module)
    {
        $templateFolder = $module->getPath() . '/Resources/views';
        $templateNamespace = 'module_'.$module->getName();
        if(file_exists($templateFolder))
        {
            $this->addPath($templateFolder, $templateNamespace);
        }
    }

} 
