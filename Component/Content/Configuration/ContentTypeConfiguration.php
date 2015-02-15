<?php
/**
 * Created by Andy Thorne
 *
 * @author Andy Thorne <contrabandvr@gmail.com>
 */

namespace GravityCMS\Component\ContentType\Configuration;


use GravityCMS\Component\Configuration\AbstractConfiguration;
use GravityCMS\Component\Configuration\ConfigurationInterface;

class ContentTypeConfiguration extends AbstractConfiguration
{
    /**
     * @var array
     */
    protected $definitions;

    /**
     * Get the type of the config
     *
     * @return string
     */
    public function getType()
    {
        return 'content_type';
    }

    /**
     * The service or object of the form
     *
     * @return string|object
     */
    public function getForm()
    {
        return null;
    }

    /**
     * @return array
     */
    public function getDefinitions()
    {
        return $this->definitions;
    }

    /**
     * @param array $definitions
     */
    public function setDefinitions($definitions)
    {
        $this->definitions = $definitions;
    }

    /**
     * @param string $definition
     */
    public function addDefinition($definition)
    {
        $this->definitions[] = $definition;
    }
}
