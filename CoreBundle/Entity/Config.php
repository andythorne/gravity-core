<?php

namespace GravityCMS\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use GravityCMS\CoreBundle\Model\Config as BaseConfig;

/**
 * @ORM\Entity
 * @ORM\Table(name="config")
 */
class Config extends BaseConfig
{
    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $name;
} 
