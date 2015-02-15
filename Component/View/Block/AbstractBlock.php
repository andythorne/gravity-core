<?php

namespace GravityCMS\Component\View\Block;

/**
 * Class AbstractBlock
 *
 * @package GravityCMS\Component\Block
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
abstract class AbstractBlock implements BlockInterface
{
    public function getParent()
    {
        return 'root';
    }
}
