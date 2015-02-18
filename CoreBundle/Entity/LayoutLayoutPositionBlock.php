<?php

namespace GravityCMS\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use GravityCMS\Component\View\Entity\LayoutLayoutPositionBlock as LayoutLayoutPositionBlockModel;

/**
 * Class LayoutLayoutPositionBlock
 *
 * @package GravityCMS\CoreBundle\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class LayoutLayoutPositionBlock extends LayoutLayoutPositionBlockModel
{
    /**
     * @var Layout
     */
    protected $layout;

    /**
     * @var LayoutPosition
     */
    protected $position;

    /**
     * @var Block
     */
    protected $block;
}
