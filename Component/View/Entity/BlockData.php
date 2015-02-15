<?php

namespace GravityCMS\Component\View\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Block
 *
 * @package GravityCMS\Component\View\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 *
 * @ORM\MappedSuperclass
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn("field_type")
 */
abstract class BlockData
{

}
