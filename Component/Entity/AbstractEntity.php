<?php

namespace GravityCMS\Component\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractEntity
 *
 * @package GravityCMS\Component\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
abstract class AbstractEntity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var AbstractEntityData[]
     */
    protected $content;

    function __construct()
    {
        $this->content = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return AbstractEntityData[]
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param AbstractEntityData $content
     */
    public function addContent(AbstractEntityData $content)
    {
        $this->content[] = $content;
        $content->setEntity($this);
    }

    /**
     * @param AbstractEntityData $content
     */
    public function removeContent(AbstractEntityData $content)
    {
        $this->content->removeElement($content);
    }
}
