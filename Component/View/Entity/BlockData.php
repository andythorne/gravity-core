<?php

namespace GravityCMS\Component\View\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Block
 *
 * @package GravityCMS\Component\View\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
abstract class BlockData
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
