<?php

namespace GravityCMS\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Block
 *
 * @package GravityCMS\CoreBundle\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 *
 * @ ORM\Entity
 * @ ORM\Table(name="block_data")
 * @ ORM\InheritanceType("JOINED")
 * @ ORM\DiscriminatorColumn("field_type")
 */
abstract class BlockData
{

}
