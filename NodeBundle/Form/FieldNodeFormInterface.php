<?php

namespace GravityCMS\NodeBundle\Form;

use GravityCMS\NodeBundle\Entity\ContentTypeField;

/**
 * Interface FieldNodeFormInterface
 *
 * @package GravityCMS\NodeBundle\Form
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
interface FieldNodeFormInterface
{
    /**
     * @param ContentTypeField $field
     */
    function __construct(ContentTypeField $field);
} 
