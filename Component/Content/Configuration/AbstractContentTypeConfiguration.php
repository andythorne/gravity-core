<?php

namespace GravityCMS\Component\ContentType\Configuration;

use GravityCMS\Component\Configuration\ConfigurationInterface;

abstract class AbstractContentTypeConfiguration implements ConfigurationInterface
{
    /**
     * The name of the parent config
     *
     * @return string
     */
    final public function getParent()
    {
        return 'content_type';
    }
}
