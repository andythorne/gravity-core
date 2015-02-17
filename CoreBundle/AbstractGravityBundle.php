<?php

namespace GravityCMS\CoreBundle;

use GravityCMS\CoreBundle\DependencyInjection\Compiler\GravityBundleCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class GravityBundle
 *
 * @package GravityCMS\Component
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
abstract class AbstractGravityBundle extends Bundle
{
    /**
     * @return string
     */
    abstract public function getBundleName();

    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new GravityBundleCompilerPass($this));
    }
}
