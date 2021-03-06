<?php

namespace GravityCMS\Component\Theme\Layout\Position;

/**
 * Class HeaderPosition
 *
 * @package GravityCMS\Component\Theme\Layout\Position
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class HeaderPosition implements PositionInterface
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'header';
    }

    /**
     * {@inheritdoc}
     */
    public function getLabel()
    {
        return 'Header';
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function getDelta()
    {
        return 10;
    }
}
