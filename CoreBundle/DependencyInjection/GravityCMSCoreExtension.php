<?php

namespace GravityCMS\CoreBundle\DependencyInjection;

use GravityCMS\Component\Module\Compiler\ModuleCompiler;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class GravityCMSCoreExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('nefarian_core.modules', $config['modules']);
        $container->setParameter('nefarian_core.themes', $config['themes']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter('gravity_cms.admin_path', $config['cms']['admin_path']);

        $container->setParameter("gravity_cms.entity_manager",   $config['entity_manager']);
        $container->setParameter("gravity_cms.backend_type_orm", $config['backend_type'] === 'orm');
        $container->setParameter("gravity_cms.default_editor",   $config['default_editor']);

        $modules = $config['modules'];

        foreach($modules as $module)
        {
            $meta = new \ReflectionClass($module);
            $service  = dirname($meta->getFileName()).'/Resources/config/services.yml';
            if(file_exists($service))
            {
                $loader->import($service);
            }
        }
    }

    /**
     * Allow an extension to prepend the extension configurations.
     *
     * @param ContainerBuilder $container
     */
    public function prepend(ContainerBuilder $container)
    {
        $configs       = $container->getExtensionConfig('gravity_cms_core');
        $configuration = new Configuration();
        $config        = $this->processConfiguration($configuration, $configs);

        $doctrineConfig = array();

        foreach($config['modules'] as $moduleClass)
        {
            $refl = new \ReflectionClass($moduleClass);
            $module = new ModuleCompiler($moduleClass);
            $module->compile();

            $path = dirname($refl->getFileName());

            if(is_dir($dir = $path . '/Entity'))
            {
                $doctrineConfig[$module->getName()] = array(
                    'prefix'    => $module->getNamespace() . '\Entity',
                    'type'      => 'php',
                    'dir'       => $dir,
                    'alias'     => 'Module' . $module->getCamelName(),
                    'is_bundle' => false
                );
            }
        }

        $container->prependExtensionConfig('doctrine', array(
            'orm' => array(
                'mappings' => $doctrineConfig,
            )
        ));
    }
}
