<?php

namespace GravityCMS\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use GravityCMS\Component\View\Entity\Layout as LayoutModel;

/**
 * Class Layout
 *
 * @package GravityCMS\CoreBundle\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class Layout extends LayoutModel
{
    /**
     * @var LayoutLayoutPositionBlock[]
     */
    protected $positions;
}
