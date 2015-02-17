<?php

namespace GravityCMS\NodeBundle\Router\PathProcessor;

use GravityCMS\NodeBundle\Entity\Node;

/**
 * Class NodePathProcessor
 *
 * @package GravityCMS\NodeBundle\Router\PathProcessor
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class NodePathProcessor implements PathProcessorInterface
{
    /**
     * @return string
     */
    public function getType()
    {
        return 'node';
    }

    public function process($field, Node $node)
    {
        $meta = new \ReflectionClass($node);
        if($meta->hasProperty($field)){
            return call_user_func(array($node, 'get'.$field));
        }
    }
} 
