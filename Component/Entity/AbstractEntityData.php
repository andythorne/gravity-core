<?php

namespace GravityCMS\Component\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractEntityData
 *
 * @package GravityCMS\Component\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
abstract class AbstractEntityData
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
     * @var int
     */
    protected $delta;

    /**
     * @var AbstractEntity
     */
    protected $entity;

    /**
     * @return string
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
     * @return AbstractEntity
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param AbstractEntity $entity
     */
    public function setEntity(AbstractEntity $entity)
    {
        $this->entity = $entity;
    }

}
