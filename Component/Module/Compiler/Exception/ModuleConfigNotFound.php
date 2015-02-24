<?php

namespace GravityCMS\Component\Module\Compiler\Exception;

use Exception;

class ModuleConfigNotFound extends \Exception
{
    public function __construct($module, Exception $previous = null)
    {
        parent::__construct("Module '{$module}' Not Found'", null, $previous);
    }
}
