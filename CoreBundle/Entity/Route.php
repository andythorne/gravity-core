<?php

namespace GravityCMS\CoreBundle\Entity;

use GravityCMS\CoreBundle\Model\Route as BaseRoute;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Route
 *
 * @package GravityCMS\CoreBundle\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 *
 * @ORM\Table(name="router")
 * @ORM\Entity
 */
class Route extends BaseRoute
{

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
} 
