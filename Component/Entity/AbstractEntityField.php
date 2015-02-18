<?php

namespace GravityCMS\Component\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractEntityField
 *
 * @package GravityCMS\Component\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
abstract class AbstractEntityField
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $delta;

    /**
     * @var AbstractEntity
     */
    protected $entity;

    /**
     * @var Field
     */
    protected $field;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
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

    /**
     * @return Field
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param Field $field
     */
    public function setField(Field $field)
    {
        $this->field = $field;
    }
}
