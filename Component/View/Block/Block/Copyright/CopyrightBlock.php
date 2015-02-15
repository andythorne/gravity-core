<?php

namespace GravityCMS\Component\View\Block\Block\Copyright;

use GravityCMS\Component\View\Block\AbstractBlock;
use GravityCMS\Component\View\Block\Configuration\AbstractBlockConfiguration;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CopyrightBlock
 *
 * @package GravityCMS\Component\View\Block\Block\Copyright
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class CopyrightBlock extends AbstractBlock
{
    /**
     * Get the block name
     *
     * @return string
     */
    public function getName()
    {
        return 'copyright';
    }

    /**
     * @return AbstractBlockConfiguration
     */
    public function getDefaultConfiguration()
    {
        return new CopyrightBlockConfiguration();
    }

    /**
     * Fetch the template name
     *
     * @param Request $request
     * @param object  $entity
     *
     * @return string
     */
    public function render(Request $request, $entity)
    {
        // TODO: Implement render() method.
    }

}
