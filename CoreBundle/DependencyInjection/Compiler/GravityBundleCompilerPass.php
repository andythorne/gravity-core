<?php

namespace GravityCMS\CoreBundle\DependencyInjection\Compiler;

use GravityCMS\CoreBundle\AbstractGravityBundle;
use GravityCMS\CoreBundle\DependencyInjection\Configuration\MenuConfiguration;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\Yaml\Parser;

/**
 * Class GravityBundleCompilerPass
 *
 * @package GravityCMS\CoreBundle\DependencyInjection\Compiler
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class GravityBundleCompilerPass implements CompilerPassInterface
{
    /**
     * @var AbstractGravityBundle
     */
    protected $bundle;

    function __construct(AbstractGravityBundle $bundle)
    {
        $this->bundle = $bundle;
    }

    /**
     * @inheritdoc
     */
    public function process(ContainerBuilder $container)
    {
        $bundleMetaInfo = new \ReflectionClass($this->bundle);
        $bundlePath = dirname($bundleMetaInfo->getFileName());

        $menuManagerDefinition  = $container->getDefinition('gravity_cms.menu_manager');

        $parser    = new Parser();
        $processor = new Processor();
        $configuration = new MenuConfiguration();
        $menus = $processor->processConfiguration(
            $configuration,
            array(
                $parser->parse(file_get_contents($bundlePath . '/Resources/config/menu.yml'))
            )
        );

        foreach ($menus as $menuName => $menu) {

            $menuManagerDefinition->addMethodCall(
                'createCategory',
                array(
                    $menuName,
                    null,
                    $menu['title'],
                    $menu['icon'],
                    $menu['description'],
                    $menu['items'],
                )
            );
        }

        // assets
        $assetManagerDefinition = $container->getDefinition('assetic.asset_manager');

        // tell asstic where the plugin assets are
        $assetNamespace = '@' . $this->bundle->getBundleName() . '/';
        $folder         = $bundlePath . '/Resources/assets/js';
        if (is_dir($folder)) {
            $jsRoot   = '/js';
            $dir      = new \RecursiveDirectoryIterator($folder);
            $ite      = new \RecursiveIteratorIterator($dir);
            $fileList = new \RegexIterator($ite, '/.+\.js/', \RegexIterator::GET_MATCH);

            foreach ($fileList as $files) {
                foreach ($files as $file) {
                    $destination = str_replace($bundlePath . '/Resources/assets/js/', '', $file);
                    $assetId     = 'nefarian_plugin_core_' . str_replace(
                            array('/', '.js'),
                            array('_', ''),
                            $destination
                        );
                    $assetPath   = '/cms/' . $this->bundle->getBundleName() . '/' . $destination;

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
