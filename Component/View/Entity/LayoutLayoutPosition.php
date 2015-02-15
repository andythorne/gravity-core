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
 */
abstract class LayoutLayoutPosition
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
     * @ORM\ManyToMany(targetEntity="BlockData", inversedBy="layoutPositions")
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


    function __construct()
    {
        $this->blocks = new ArrayCollection();
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
    public function getBlocks()
    {
        return $this->blocks;
    }

    /**
     * @param Block $block
     */
    public function addBlock(Block $block)
    {
        $this->blocks[] = $block;
    }

    /**
     * @param Block $block
     */
    public function removeBlock(Block $block)
    {
        $this->blocks->removeElement($block);
    }
}
