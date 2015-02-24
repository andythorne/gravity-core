<?php

namespace GravityCMS\CoreBundle\DependencyInjection\Compiler;

use Symfony\Bundle\AsseticBundle\DependencyInjection\DirectoryResourceDefinition;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class ThemeCompilerPass
 *
 * @package GravityCMS\CoreBundle\DependencyInjection\Compiler
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class ThemeCompilerPass implements CompilerPassInterface
{
    /**
     * @inheritdoc
     */
    public function process(ContainerBuilder $container)
    {
        $themes = $container->findTaggedServiceIds('gravity_cms.theme');

        $themeManagerDefinition = $container->getDefinition('gravity_cms.theme_manager');
        $themeManagerReference  = new Reference('gravity_cms.theme_manager');

        foreach ($themes as $sid => $tags) {
            $themeDefinition = $container->getDefinition($sid);
            $meta            = new \ReflectionClass($themeDefinition->getClass());
            $path            = pathinfo($meta->getFileName(), PATHINFO_DIRNAME);

            foreach ($tags as $tag) {

                $alias = $tag['alias'];
                $themeManagerDefinition->addMethodCall('addTheme', array(new Reference($sid)));

                $loader            = $container->findDefinition('twig.loader.theme_loader');
                $templateFolder    = $path . '/Resources/views';
                $templateNamespace = 'theme_' . $alias;
                if (file_exists($templateFolder)) {
                    $loader->addMethodCall('addPath', array($templateFolder, $templateNamespace));
                }

                // register theme with assetic
                $assetManagerDefinition = $container->findDefinition('assetic.asset_manager');
                $engines                = $container->getParameter('templating.engines');
                foreach ($engines as $engine) {
                    $resourceDefinitionId = 'assetic.' . $engine . '_directory_resource.theme_' . $alias;
                    $container->setDefinition(
                        $resourceDefinitionId,
                        new DirectoryResourceDefinition('theme_' . $alias, $engine, array(
                            $container->getParameter('kernel.root_dir') . '/Resources/theme_' . $alias .
                            '/views',
                            $path . '/Resources/views',
                        ))
                    );
                    $assetManagerDefinition->addMethodCall('addResource',
                        array(new Reference($resourceDefinitionId), $engine));
                }

                // add the theme manager into the asset factory
                $assetFactoryDefinition = $container->findDefinition('assetic.asset_factory');
                $assetFactoryDefinition->addMethodCall('setThemeManager', array($themeManagerReference));


                // tell asstic where the theme assets are
                $jsAssets = @glob($path . '/Resources/assets/js/*.js');
                if (count($jsAssets)) {
                    foreach ($jsAssets as $jsAsset) {
                        $destination = str_replace($path . '/Resources/assets/js/', '', $jsAsset);
                        $assetManagerDefinition->addMethodCall('setFormula', array(
                            'gravity_theme_' . $alias . '_' .
                            str_replace(array('/', '.js'), array('_', ''), $destination), array(
                                $jsAsset,
                                array('?uglifyjs2'),
                                array(
                                    'output' => 'js/theme/' . $alias . '/' . $destination
                                ),
                            )
                        ));
                    }
                }

                $maps = array(
                    '.jpg'  => 'jpegoptim',
                    '.jpeg' => 'jpegoptim',
                    '.png'  => 'optipng',
                    '.gif'  => null,
                );
                foreach ($maps as $ext => $app) {
                    // image assets
                    $imgAssets = @glob($path . '/Resources/assets/img/*' . $ext);
                    if (count($imgAssets)) {
                        if ($app) {
                            $app = array('?' . $app);
                        } else {
                            $app = array();
                        }

                        foreach ($imgAssets as $imgAsset) {
                            $destination = str_replace($path . '/Resources/assets/img/', '', $imgAsset);
                            $assetManagerDefinition->addMethodCall('setFormula', array(
                                'gravity_theme_' . $alias . '_' .
                                str_replace(array('/', $ext), array('_', ''), $destination), array(
                                    $imgAsset,
                                    $app,
                                    array(
                                        'output' => 'img/theme/' . $alias . '/' . $destination
                                    ),
                                )
                            ));
                        }
                    }
                }
            }
        }

        // blocks
        $taggedBlocks = $container->findTaggedServiceIds('layout.block');
        $blockManagerDefinition = $container->getDefinition('gravity_cms.theme.block_manager');

        $blockServices = array();
        foreach($taggedBlocks as $sid => $tags)
        {
            $blockServices[] = new Reference($sid);
        }
        $blockManagerDefinition->addMethodCall('setBlocks', array($blockServices));

        // layouts positions
        $taggedLayoutPositions = $container->findTaggedServiceIds('layout.position');
        $layoutManagerDefinition = $container->getDefinition('gravity_cms.theme.layout_manager');

        $layoutPositionServices = array();
        foreach($taggedLayoutPositions as $sid => $tags)
        {
            $layoutPositionServices[] = new Reference($sid);
        }
        $layoutManagerDefinition->addMethodCall('setPositions', array($layoutPositionServices));
    }
} 
