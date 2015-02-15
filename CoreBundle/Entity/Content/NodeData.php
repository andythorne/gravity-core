<?php

namespace GravityCMS\CoreBundle\Entity\Content;

use Doctrine\ORM\Mapping as ORM;
use GravityCMS\Component\Entity\AbstractEntityData;

/**
 * @ORM\Entity
 * @ORM\Table(name="node_data")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn("field_type")
 */
class NodeData extends AbstractEntityData
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;


    /**
     * @var Node
     *
     * @ORM\ManyToOne(targetEntity="node", inversedBy="content")
     */
    protected $entity;
}
