<?php

namespace GravityCMS\Component\View\Block;

use GravityCMS\Component\View\Block\Configuration\AbstractBlockConfiguration;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface BlockInterface
 *
 * @package GravityCMS\Component\Block
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
interface BlockInterface
{
    /**
     * Get the block name
     *
     * @return string
     */
    public function getName();

    /**
     * Get the parent name
     *
     * @return string
     */
    public function getParent();

    /**
     * @return AbstractBlockConfiguration
     */
    public function getDefaultConfiguration();

    /**
     * Fetch the template name
     *
     * @param Request $request
     * @param object  $entity
     *
     * @return string
     */
    public function render(Request $request, $entity);
}
