<?php

namespace GravityCMS\Component\ContentType;

use GravityCMS\Component\Configuration\ConfigurationManager;
use GravityCMS\CoreBundle\Entity\Config;

/**
 * Class ContentTypeManager
 *
 * @package GravityCMS\Component\ContentType
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class ContentTypeManager
{
    /**
     * @var ConfigurationManager
     */
    protected $configurationManager;


    protected $contentTypeConfiguration;

    function __construct(ConfigurationManager $configurationManager)
    {
        $this->configurationManager = $configurationManager;
    }

    /**
     * @param string $content
     *
     * @return Config
     */
    public function getConfiguration($content)
    {
        $name = "content_type.{$content}";

        return $this->configurationManager->get($name);
    }

    /**
     * @param string $content
     *
     * @return Config[]
     */
    public function getFieldsConfiguration($content)
    {
        $name = "content_type.{$content}.field.%";

        return $this->configurationManager->getSet($name);
    }

    /**
     * @param $contentType
     * @param $field
     *
     * @return Config
     */
    public function getFieldConfiguration($contentType, $field)
    {
        $name = "content_type.{$contentType}.field.{$field}";

        return $this->configurationManager->get($name);
    }
}
