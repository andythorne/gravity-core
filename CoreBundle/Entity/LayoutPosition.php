<?php

namespace GravityCMS\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GravityCMS\Component\Theme\Entity\LayoutPosition as LayoutPositionModel;

/**
 * Class LayoutPosition
 *
 * @package GravityCMS\CoreBundle\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class  LayoutPosition extends LayoutPositionModel
{
    /**
     * @var LayoutPositionBlock[]
     */
    protected $layouts;
}
