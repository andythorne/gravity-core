<?php

namespace GravityCMS\NodeBundle\Model;


interface FieldEntityInterface
{
    public function setContentType(ContentType $contentType);

    public function getContentType();
}
