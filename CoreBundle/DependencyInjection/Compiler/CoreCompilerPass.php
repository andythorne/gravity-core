<?php

namespace GravityCMS\CoreBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class CoreCompilerPass
 *
 * @package GravityCMS\CoreBundle\DependencyInjection\Compiler
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class CoreCompilerPass implements CompilerPassInterface
{
    /**
     * @inheritdoc
     */
    public function process(ContainerBuilder $container)
    {
        $adminRouterDefinition = $container->getDefinition('gravity_cms.routing.admin_loader');

        $adminRouterDefinition->addMethodCall('setAdminPath',
            array($container->getParameter('gravity_cms.admin_path')));

        $assetManagerDefinition = $container->getDefinition('assetic.asset_manager');

        $meta = new \ReflectionClass('\GravityCMS\CoreBundle\GravityCMSCoreBundle');
        $path = pathinfo($meta->getFileName(), PATHINFO_DIRNAME);

        // tell asstic where the plugin assets are
        $assetNamespace = '@core/';
        $folder         = $path . '/Resources/assets/js';
        if (is_dir($folder)) {
            $jsRoot   = '/js';
            $dir      = new \RecursiveDirectoryIterator($folder);
            $ite      = new \RecursiveIteratorIterator($dir);
            $fileList = new \RegexIterator($ite, '/.+\.js/', \RegexIterator::GET_MATCH);

            foreach ($fileList as $files) {
                foreach ($files as $file) {
                    $destination = str_replace($path . '/Resources/assets/js/', '', $file);
                    $assetId     = 'nefarian_plugin_core_' . str_replace(
                            array('/', '.js'),
                            array('_', ''),
                            $destination
                        );
                    $assetPath   = '/cms/core/' . $destination;

                    $assetManagerDefinition->addMethodCall(
                        'setFormula',
                        array(
                            $assetId,
                            array(
                                $file,
                                array('?uglifyjs2'),
                                array(
                                    'output' => $jsRoot . $assetPath
                                ),
                            )
                        )
                    );
                }
            }
        }
    }
} 
