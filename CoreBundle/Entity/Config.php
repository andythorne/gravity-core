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
}
