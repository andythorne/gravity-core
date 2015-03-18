<?php

namespace GravityCMS\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use GravityCMS\Component\Theme\Entity\Layout as LayoutModel;

/**
 * Class Layout
 *
 * @package GravityCMS\CoreBundle\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class Layout extends LayoutModel
{
    /**
     * @var LayoutPositionBlock[]
     */
    protected $positions;
}
