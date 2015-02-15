<?php

namespace GravityCMS\Component\Configuration;

use Doctrine\ORM\EntityManager;
use GravityCMS\CoreBundle\Entity\Config;
use GravityCMS\CoreBundle\Entity\Repository\ConfigRepository;

/**
 * Class ConfigurationManager
 *
 * @package GravityCMS\Component\Configuration
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class ConfigurationManager
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var ConfigRepository
     */
    protected $configRepo;

    function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->configRepo    = $this->entityManager->getRepository('GravityCMSCoreBundle:Config');
    }

    /**
     * @param string $name
     *
     * @return ConfigurationInterface
     * @throws \Exception
     */
    public function get($name)
    {
        $config = $this->configRepo->findOneByName($name);

        if(!$config instanceof Config)
        {
            throw new \Exception("Configuration \"{$name}\" not found");
        }

        return $config->getValue();
    }

    /**
     * @param $pattern
     *
     * @return ConfigurationInterface[]
     */
    public function getSet($pattern)
    {
        $configEntities = $this->configRepo->findByPattern($pattern);

        $configs = array();
        foreach ($configEntities as $configEntity) {
            $configs[] = $configEntity->getValue();
        }

        return $configs;
    }

    /**
     * @param ConfigurationInterface $config
     */
    public function set(ConfigurationInterface $config)
    {
        $name = $this->getConfigurationName($config);

        // get the existing config entity
        $configEntity = $this->configRepo->find($name);
        if ($configEntity instanceof Config) {
            $config = clone $config; // doctrine can't see if a config has changed unless we clone it into itself...
            $configEntity->setValue($config);
        } else {
            $configEntity = new Config();
            $configEntity->setName($name);
            $configEntity->setPattern($this->getConfigurationPattern($config));
            $configEntity->setValue($config);
        }

        $this->entityManager->persist($configEntity);
        $this->entityManager->flush($configEntity);

    }

    public function flush($pattern)
    {
        return $this->configRepo->flushByPattern($pattern);
    }

    /**
     * @param ConfigurationInterface $configuration
     *
     * @return Config
     */
    public function create(ConfigurationInterface $configuration)
    {
        $this->set($configuration);

        return $configuration;
    }

    /**
     * @param ConfigurationInterface $configuration
     *
     * @return string
     */
    public function getConfigurationName(ConfigurationInterface $configuration)
    {
        $parent = $configuration->getParent();
        $type   = $configuration->getType() . ':' . $configuration->getConfigurationName();

        if ($parent === 'root') {
            return $type;
        } else {
            $parentConfig = $this->get($parent);

            return $this->getConfigurationName($parentConfig) . '.' . $type;
        }
    }

    /**
     * @param ConfigurationInterface $configuration
     *
     * @return string
     */
    public function getConfigurationPattern(ConfigurationInterface $configuration)
    {
        $parent = $configuration->getParent();
        $type   = $configuration->getType() . ':%';

        if ($parent === 'root') {
            return $type;
        } else {
            $parentConfig = $this->get($parent);

            return $this->getConfigurationName($parentConfig) . ':' . $type;
        }
    }
}
