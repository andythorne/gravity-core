<?php

namespace GravityCMS\CoreBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use GravityCMS\Component\Configuration\ConfigurationInterface;

/**
 * Class Config
 *
 * @package GravityCMS\CoreBundle\Model
 * @author  Andy Thorne <contrabandvr@gmail.com>
 *
 * @ORM\MappedSuperclass
 */
class Config
{
    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $pattern;

    /**
     * @var string
     *
     * @ORM\Column(type="object")
     */
    protected $value;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @param string $pattern
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param ConfigurationInterface $value
     */
    public function setValue(ConfigurationInterface $value)
    {
        $this->value = $value;
    }
}
