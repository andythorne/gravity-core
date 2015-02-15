<?php

namespace GravityCMS\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GravityCMS\Component\View\Entity\LayoutPosition as LayoutPositionModel;

/**
 * Class LayoutPosition
 *
 * @package GravityCMS\CoreBundle\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="layout_position")
 */
class  LayoutPosition extends LayoutPositionModel
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var LayoutLayoutPosition[]
     *
     * @ORM\OneToMany(targetEntity="LayoutLayoutPosition", mappedBy="position")
     */
    protected $layouts;
}
