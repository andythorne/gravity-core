<?php

namespace GravityCMS\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GravityCMS\Component\View\Entity\Layout as LayoutModel;

/**
 * Class Layout
 *
 * @package GravityCMS\CoreBundle\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="layout")
 */
class Layout extends LayoutModel
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var LayoutLayoutPositionBlock[]
     *
     * @ORM\OneToMany(targetEntity="LayoutLayoutPositionBlock", mappedBy="layout")
     */
    protected $positions;
}
