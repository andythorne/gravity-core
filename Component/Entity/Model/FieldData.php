<?php

namespace GravityCMS\Component\Entity\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class FieldData
 *
 * @package GravityCMS\Component\Entity\Model
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
abstract class FieldData
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
     * @var Entity
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
     * @return Entity
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param Entity $entity
     */
    public function setEntity(Entity $entity)
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
