<?php

namespace GravityCMS\CoreBundle\Entity\Content;

use Doctrine\ORM\Mapping as ORM;
use GravityCMS\Component\Content\Entity\ContentType as ContentTypeModel;

/**
 * Class ContentType
 *
 * @package GravityCMS\CoreBundle\Entity\NodeEntity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 *
 * @ORM\Entity
 * @ORM\Table(name="content_type")
 */
class ContentType extends ContentTypeModel
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;
}
