<?php

namespace GravityCMS\NodeBundle\Router;

use GravityCMS\Component\Configuration\ConfigurationManager;
use GravityCMS\NodeBundle\Configuration\RoutingConfiguration;
use GravityCMS\NodeBundle\Entity\Node;
use GravityCMS\NodeBundle\Router\PathProcessor\PathProcessorInterface;

/**
 * Class NodeRouterManager
 *
 * @package GravityCMS\NodeBundle\Router
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class NodeRouterManager
{
    /**
     * @var PathProcessorInterface[]
     */
    protected $pathProcessors = array();

    /**
     * @var ConfigurationManager
     */
    protected $configManager;

    function __construct(ConfigurationManager $configManager)
    {
        $this->configManager = $configManager;
    }

    /**
     * @param PathProcessorInterface $pathProcessor
     */
    public function addPathProcessor(PathProcessorInterface $pathProcessor)
    {
        $this->pathProcessors[] = $pathProcessor;
    }

    /**
     * @param Node   $node
     * @param string $type
     * @param string $field
     *
     * @return mixed
     */
    public function process(Node $node, $type, $field)
    {
        $term = null;
        foreach ($this->pathProcessors as $pathProcessor) {
            if ($pathProcessor->getType() == $type) {
                $term = $pathProcessor->process($field, $node);
            }
        }

        if(!$term){
            $term = $field;
        }

        // process the result
        /** @var RoutingConfiguration $routingConfig */
        $routingConfig = $this->configManager->get('routing.settings');
        $term = $routingConfig->processString($term);

        return $term;
    }

} 
