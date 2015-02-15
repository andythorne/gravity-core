<?php

namespace GravityCMS\Component\View\Layout\Position;

/**
 * Class NavigationPosition
 *
 * @package GravityCMS\Component\View\Layout\Position
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class NavigationPosition implements PositionInterface
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'navigation';
    }

    /**
     * {@inheritdoc}
     */
    public function getLabel()
    {
        return 'Navigation';
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return '';
    }
}
