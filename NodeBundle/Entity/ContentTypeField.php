<?php

namespace GravityCMS\NodeBundle\Entity;

use GravityCMS\NodeBundle\Model\ContentTypeField as BaseContentTypeField;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class ContentTypeField
 *
 * @package Nefarian\CmsBundle\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class ContentTypeField extends BaseContentTypeField
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var Field
     *
     * @ORM\ManyToOne(targetEntity="Field", inversedBy="typeFields", cascade={"persist"})
     */
    protected $contentType;

    /**
     * @var Field
     *
     * @ORM\ManyToOne(targetEntity="Field", inversedBy="typeFields", cascade={"persist"})
     */
    protected $field;
} 
