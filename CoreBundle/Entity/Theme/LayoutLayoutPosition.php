<?php

namespace GravityCMS\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GravityCMS\Component\View\Entity\LayoutLayoutPosition as LayoutLayoutPositionModel;

/**
 * Class LayoutLayoutPositionBlock
 *
 * @package GravityCMS\CoreBundle\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="layout_layout_position")
 */
class LayoutLayoutPosition extends LayoutLayoutPositionModel
{
    /**
     * @var Layout
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Layout", inversedBy="positions")
     * @ORM\JoinColumn(name="layout_id", referencedColumnName="id")
     */
    protected $layout;

    /**
     * @var LayoutPosition
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="LayoutPosition", inversedBy="layouts")
     * @ORM\JoinColumn(name="layout_position_id", referencedColumnName="id")
     */
    protected $position;

    /**
     * @var Block[]
     *
     * @ORM\ManyToMany(targetEntity="Block", inversedBy="layoutPositions")
     * @ORM\JoinTable(
     *      name="layout_layout_position_block",
     *      joinColumns={
     *          @ORM\JoinColumn(name="layout_id", referencedColumnName="layout_id"),
     *          @ORM\JoinColumn(name="layout_position_id", referencedColumnName="layout_position_id")
     *      },
     *      inverseJoinColumns={
     *          @ORM\JoinColumn(name="block_id", referencedColumnName="id", unique=true)
     *      }
     * )
     */
    protected $blocks;
}
