<?php

namespace GravityCMS\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use GravityCMS\Component\View\Entity\LayoutLayoutPositionBlock as LayoutLayoutPositionBlockModel;

/**
 * Class LayoutLayoutPositionBlock
 *
 * @package GravityCMS\CoreBundle\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="layout_layout_position_block")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn("block_type")
 */
class LayoutLayoutPositionBlock extends LayoutLayoutPositionBlockModel
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var Layout
     *
     * @ORM\ManyToOne(targetEntity="Layout", inversedBy="positions")
     * @ORM\JoinColumn(name="layout_id", referencedColumnName="id")
     */
    protected $layout;

    /**
     * @var LayoutPosition
     *
     * @ORM\ManyToOne(targetEntity="LayoutPosition", inversedBy="layouts")
     * @ORM\JoinColumn(name="layout_position_id", referencedColumnName="id")
     */
    protected $position;


    /**
     * @var Block
     *
     * @ORM\ManyToOne(targetEntity="Block")
     * @ORM\JoinColumn(name="block_id", referencedColumnName="id")
     */
    protected $block;
}
