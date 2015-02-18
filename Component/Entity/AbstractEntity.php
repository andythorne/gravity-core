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
     * @var AbstractEntityField[]
     */
    protected $fields;

    function __construct()
    {
        $this->fields = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return AbstractEntityField[]
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param AbstractEntityField $field
     */
    public function addField(AbstractEntityField $field)
    {
        $this->fields[] = $field;
        $field->setEntity($this);
    }

    /**
     * @param AbstractEntityField $field
     */
    public function removeField(AbstractEntityField $field)
    {
        $this->fields->removeElement($field);
    }
}
