<?php

namespace GravityCMS\Component\Theme\Theme\GravityAdmin;

use GravityCMS\Component\Theme\AbstractTheme;

/**
 * Class GravityAdminTheme
 *
 * @package GravityCMS\Component\Theme\Theme\GravityAdmin
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class GravityAdminTheme extends AbstractTheme
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'gravity_admin';
    }

    public function getLabel()
    {
        return 'Gravity Theme';
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return self::TYPE_ADMIN;
    }
} 
