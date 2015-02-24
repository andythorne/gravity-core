<?php

namespace GravityCMS\CoreBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

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
        $adminRouterDefinition  = $container->getDefinition('gravity_cms.routing.admin_loader');
        $fieldManagerDefinition = $container->getDefinition('gravity_cms.field_manager');

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

        // load in all the fields
        $fields = $container->findTaggedServiceIds('gravity.field');
        foreach ($fields as $sId => $def) {
            $fieldManagerDefinition->addMethodCall('addField', array(new Reference($sId)));
        }

        $fieldWidgets = $container->findTaggedServiceIds('gravity.field.widget');
        foreach ($fieldWidgets as $sId => $def) {
            $fieldManagerDefinition->addMethodCall('addFieldWidget', array(new Reference($sId)));
        }

        $fieldDisplays = $container->findTaggedServiceIds('EditorCompilerPass.php.field.display');
        foreach ($fieldDisplays as $sId => $def) {
            $fieldManagerDefinition->addMethodCall('addFieldDisplay', array(new Reference($sId)));
        }
    }
} 
