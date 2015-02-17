<?php

namespace GravityCMS\NodeBundle;

use GravityCMS\CoreBundle\AbstractGravityBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use GravityCMS\NodeBundle\DependencyInjection\Compiler as Compilers;

class GravityCMSNodeBundle extends AbstractGravityBundle
{
    /**
     * @return string
     */
    public function getBundleName()
    {
        return 'node';
    }

    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new Compilers\NodeCompilerPass());
    }
}
