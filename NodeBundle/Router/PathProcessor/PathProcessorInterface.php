<?php

namespace GravityCMS\NodeBundle\Router\PathProcessor;

use GravityCMS\NodeBundle\Entity\Node;

/**
 * Interface PathProcessorInterface
 *
 * @package GravityCMS\NodeBundle\Router\PathProcessor
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
interface PathProcessorInterface
{
    /**
     * @return string
     */
    public function getType();

    /**
     * Translate a field and node entity into a value
     *
     * @param string $field
     * @param Node   $node
     *
     * @return mixed
     */
    public function process($field, Node $node);
} 
