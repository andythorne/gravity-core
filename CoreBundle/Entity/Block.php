<?php

namespace GravityCMS\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use GravityCMS\Component\Theme\Entity\Block as BlockModel;

/**
 * Class Block
 *
 * @package GravityCMS\CoreBundle\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class Block extends BlockModel
{
    /**
     * @var LayoutPositionBlock[]
     */
    protected $layoutPositions;

}
