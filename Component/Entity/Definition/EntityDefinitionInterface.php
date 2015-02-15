<?php

namespace GravityCMS\Component\Entity\Definition;

/**
 * Interface EntityDefinitionInterface
 *
 * @package GravityCMS\Component\Entity\Definition
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
interface EntityDefinitionInterface
{
    public function getListController();

    public function getDisplayController();
}
