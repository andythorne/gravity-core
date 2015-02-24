<?php

namespace GravityCMS\CoreBundle\DependencyInjection\Compiler;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use GravityCMS\Component\Module\Compiler\ModuleCompiler;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class ModuleCompilerPass
 *
 * @package GravityCMS\CoreBundle\DependencyInjection\Compiler
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class ModuleCompilerPass implements CompilerPassInterface
{
    /**
     * @inheritdoc
     */
    public function process(ContainerBuilder $container)
    {
        $modules = $container->findTaggedServiceIds('gravity.module');

        $moduleManagerDefinition       = $container->getDefinition('gravity_cms.module_manager');
        $moduleRouterDefinition        = $container->getDefinition('gravity_cms.routing.module_loader');
        $menuManagerDefinition         = $container->getDefinition('gravity_cms.menu_manager');
        $assetManagerDefinition        = $container->getDefinition('assetic.asset_manager');
        $twigLoaderDefinition          = $container->findDefinition('twig.loader.module_loader');
        $gravityAssetManagerDefinition = $container->getDefinition('gravity_cms.asset_manager');

        $assetMap = array();

        foreach ($modules as $sid => $attrs) {
            $moduleDefinition = $container->findDefinition($sid);
            $moduleReference  = new Reference($sid);
            $moduleManagerDefinition->addMethodCall('registerModule', array($moduleReference));

            $moduleClass = $moduleDefinition->getClass();
            $module      = new ModuleCompiler($moduleClass);
            $module->compile();
            $path = $module->getPath();

            // register the modules with the router
            $routingResource = $path . DIRECTORY_SEPARATOR . 'Resources/config/routing/routing.yml';
            if (file_exists($routingResource)) {
                $moduleRouterDefinition->addMethodCall('addModuleResource', array($moduleReference, $routingResource));
            }

            // Add the default module template path to the twig loader
            $twigLoaderDefinition->addMethodCall('addModule', array($moduleReference));

            // build an array of all assets, then inject the maps into the asset controller
            $assetNamespace = '@module_' . $module->getName() . '/';

            // tell asstic where the module assets are
            $folder = $path . '/Resources/assets/js';
            if (is_dir($folder)) {
                $jsRoot   = '/js';
                $dir      = new \RecursiveDirectoryIterator($folder);
                $ite      = new \RecursiveIteratorIterator($dir);
                $fileList = new \RegexIterator($ite, '/.+\.js/', \RegexIterator::GET_MATCH);

                foreach ($fileList as $files) {
                    foreach ($files as $file) {
                        $destination = str_replace($module->getPath() . '/Resources/assets/js/', '', $file);
                        $assetId     = 'gravity_module_' . $module->getName() . '_' . str_replace(
                                array('/', '.js'),
                                array('_', ''),
                                $destination
                            );
                        $assetPath   = '/cms/' . $module->getName() . '/' . $destination;

                        $assetMap[$assetNamespace . $destination] = $assetPath;

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

            $folder = $path . '/Resources/assets/img';
            if (is_dir($folder)) {
                $imgRoot = '/img';
                $maps    = array(
                    '.jpg'  => 'jpegoptim',
                    '.jpeg' => 'jpegoptim',
                    '.png'  => 'optipng',
                    '.gif'  => null,
                );
                foreach ($maps as $ext => $app) {
                    if ($app) {
                        $app = array('?' . $app);
                    } else {
                        $app = array();
                    }

                    $dir      = new \RecursiveDirectoryIterator($folder);
                    $ite      = new \RecursiveIteratorIterator($dir);
                    $fileList = new \RegexIterator($ite, '/.+\.' . $ext . '/', \RegexIterator::GET_MATCH);

                    foreach ($fileList as $files) {
                        foreach ($files as $file) {
                            $destination = str_replace($path . '/Resources/assets/img/', '', $file);
                            $assetPath   = '/theme/' . $module->getName() . '/' . $destination;

                            $assetMap[$assetNamespace . $destination] = $assetPath;

                            $assetManagerDefinition->addMethodCall(
                                'setFormula',
                                array(
                                    'gravity_module_' . $module->getName() . '_' . str_replace(
                                        array('/', $ext),
                                        array('_', ''),
                                        $destination
                                    ),
                                    array(
                                        $file,
                                        $app,
                                        array(
                                            'output' => $imgRoot . $assetPath
                                        ),
                                    )
                                )
                            );
                        }
                    }
                }
            }

            // TODO: Finish loading module menu
            $menus = $module->getConfig($module::CONFIG_MENU);
            foreach ($menus as $menuName => $menu) {

                $menuManagerDefinition->addMethodCall(
                    'createCategory',
                    array(
                        $menuName,
                        $module->getName(),
                        $menu['title'],
                        $menu['icon'],
                        $menu['description'],
                        $menu['items'],
                    )
                );
            }

            // load all the entity mappings, if they exist
            if (is_dir($modelPath = $path . DIRECTORY_SEPARATOR . 'Resources/config/model/doctrine')) {
                // set the validations mappings
                $mappings = array(
                    'xml'  => 'xml',
                    'yaml' => 'yml'
                );
                foreach ($mappings as $mapping => $extension) {
                    if (!$container->hasParameter(
                        'validator.mapping.loader.' . $mapping . '_files_loader.mapping_files'
                    )
                    ) {
                        continue;
                    }

                    $files          = $container->getParameter(
                        'validator.mapping.loader.' . $mapping . '_files_loader.mapping_files'
                    );
                    $validationPath = 'Resources/config/validation.orm.' . $extension;

                    $file = $path . DIRECTORY_SEPARATOR . $validationPath;
                    if (is_file($file)) {
                        $files[] = realpath($file);
                        $container->addResource(new FileResource($file));
                    }

                    $container->setParameter(
                        'validator.mapping.loader.' . $mapping . '_files_loader.mapping_files',
                        $files
                    );
                }

                $mappings    = array(
                    $modelPath => $module->getNamespace() . '\Model',
                );
                $doctinePass = DoctrineOrmMappingsPass::createXmlMappingDriver(
                    $mappings,
                    array('gravity_cms.entity_manager'),
                    'gravity_cms.backend_type_orm'
                );
                $doctinePass->process($container);
            }

            if (is_dir($modelPath = $path . DIRECTORY_SEPARATOR . 'Resources/config/entity/doctrine')) {
                $mappings    = array(
                    $modelPath => $module->getNamespace() . '\Entity',
                );
                $doctinePass = DoctrineOrmMappingsPass::createXmlMappingDriver(
                    $mappings,
                    array('gravity_cms.entity_manager'),
                    'gravity_cms.backend_type_orm'
                );
                $doctinePass->process($container);
            }

            // add the assetmap to the asset manager
            $gravityAssetManagerDefinition->addMethodCall('setAssets', array($assetMap));

            // add the module forms to the form list
            $formResources    = $container->getParameter('twig.form.resources');
            $templatingConfig = $module->getConfig($module::CONFIG_TEMPLATING);
            if($templatingConfig) {
                foreach ($templatingConfig['forms'] as $tmplName => $template) {
                    $formResources[] = $template;
                }
                $container->setParameter('twig.form.resources', $formResources);
            }

            // fire any module compiler passes
            $class = $module->getNamespace() . '\\DependencyInjection\\Compiler\\' . $module->getCamelName() .
                     'CompilerPass';
            if (class_exists($class)) {
                /** @var CompilerPassInterface $moduleCompilerPass */
                $moduleCompilerPass = new $class();
                $moduleCompilerPass->process($container);
            }

            /**
             * @TODO: dump cached
             * @see http://symfony.com/doc/current/components/dependency_injection/compilation.html#dumping-the-configuration-for-performance
             */
        }
    }
} 
