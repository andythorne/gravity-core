<?php

namespace GravityCMS\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use GravityCMS\Component\View\Entity\Block as BlockModel;

/**
 * Class Block
 *
 * @package GravityCMS\CoreBundle\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="block")
 */
class Block extends BlockModel
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var LayoutLayoutPosition[]
     *
     * @ORM\ManyToMany(targetEntity="LayoutLayoutPosition", mappedBy="blocks")
     */
    protected $layoutPositions;

}
