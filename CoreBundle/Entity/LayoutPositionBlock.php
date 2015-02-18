<?php

namespace GravityCMS\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use GravityCMS\Component\Theme\Entity\LayoutPositionBlock as LayoutPositionBlockModel;

/**
 * Class LayoutPositionBlock
 *
 * @package GravityCMS\CoreBundle\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class LayoutPositionBlock extends LayoutPositionBlockModel
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
