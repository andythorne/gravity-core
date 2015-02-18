<?php

namespace GravityCMS\Component\Content\Entity;

use Doctrine\ORM\Mapping as ORM;
use GravityCMS\Component\Entity\Entity\AbstractEntityData;

/**
 * Class AbstractField
 *
 * @package GravityCMS\Component\Field
 * @author  Andy Thorne <contrabandvr@gmail.com>
 *
 * @ORM\MappedSuperclass
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn("field_type")
 */
abstract class AbstractContentField extends AbstractEntityData
{
    /**
     * @var ContentType
     *
     * @ORM\ManyToMany(targetEntity="ContentType")
     */
    protected $contentType;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $fieldName;
}
