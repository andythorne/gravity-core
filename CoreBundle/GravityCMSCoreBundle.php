<?php

namespace GravityCMS\CoreBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use GravityCMS\CoreBundle\DependencyInjection\Compiler as Compilers;

class GravityCMSCoreBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new Compilers\CoreCompilerPass());
        $container->addCompilerPass(new Compilers\EntityCompilerPass());
        $container->addCompilerPass(new Compilers\MenuCompilerPass());
        $container->addCompilerPass(new Compilers\ThemeCompilerPass());
    }
}
