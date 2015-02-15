<?php

namespace GravityCMS\Component\View\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Layout
 *
 * @package GravityCMS\Component\View\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 *
 * @ORM\MappedSuperclass
 */
abstract class Layout
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $description;

    /**
     * @var LayoutLayoutPosition[]
     *
     * @ORM\OneToMany(targetEntity="LayoutLayoutPosition", mappedBy="layout")
     */
    protected $positions;

    function __construct()
    {
        $this->positions = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return LayoutPosition[]
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * @param LayoutPosition $position
     */
    public function addPosition(LayoutPosition $position)
    {
        $this->positions[] = $position;
    }

    /**
     * @param LayoutPosition $position
     */
    public function removePosition(LayoutPosition $position)
    {
        $this->positions->removeElement($position);
    }
}
