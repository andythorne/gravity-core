<?php

namespace GravityCMS\Component\View\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class LayoutPosition
 *
 * @package GravityCMS\Component\View\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 *
 * @ORM\MappedSuperclass
 */
abstract class LayoutPosition
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
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $delta;

    /**
     * @var LayoutLayoutPositionBlock[]
     *
     * @ORM\OneToMany(targetEntity="LayoutLayoutPositionBlock", mappedBy="position")
     */
    protected $layouts;

    function __construct()
    {
        $this->layouts = new ArrayCollection();
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
     * @return int
     */
    public function getDelta()
    {
        return $this->delta;
    }

    /**
     * @param int $delta
     */
    public function setDelta($delta)
    {
        $this->delta = $delta;
    }

    /**
     * @return Layout[]
     */
    public function getLayouts()
    {
        return $this->layouts;
    }

    /**
     * @param Layout $layout
     */
    public function addLayout(Layout $layout)
    {
        $this->layouts[] = $layout;
    }

    /**
     * @param Layout $layout
     */
    public function removeLayout(Layout $layout)
    {
        $this->layouts->removeElement($layout);
    }
}
