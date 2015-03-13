<?php

namespace GravityCMS\NodeBundle;

use GravityCMS\Component\Bundle\GravityBundle;
use GravityCMS\NodeBundle\DependencyInjection\Compiler as Compilers;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class GravityCMSNodeBundle extends GravityBundle
{
    /**
     * @return string
     */
    public function getGravityBundleName()
    {
        return 'node';
    }

    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new Compilers\NodeCompilerPass());
    }
}
