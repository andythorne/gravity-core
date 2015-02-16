<?php

namespace GravityCMS\Component\View\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class LayoutLayoutPositionBlock
 *
 * @package GravityCMS\Component\View\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 *
 * @ORM\MappedSuperclass
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn("field_type")
 */
abstract class LayoutLayoutPositionBlock
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

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return LayoutPosition
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param LayoutPosition $position
     */
    public function setPosition(LayoutPosition $position)
    {
        $this->position = $position;
    }

    /**
     * @return Layout
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @param Layout $layout
     */
    public function setLayout(Layout $layout)
    {
        $this->layout = $layout;
    }

    /**
     * @return Block
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * @param Block $block
     */
    public function setBlock(Block $block)
    {
        $this->block = $block;
    }
}
