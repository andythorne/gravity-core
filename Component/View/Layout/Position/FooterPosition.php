<?php

namespace GravityCMS\Component\View\Layout\Position;

/**
 * Class FooterPosition
 *
 * @package GravityCMS\Component\View\Layout\Position
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class FooterPosition implements PositionInterface
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'footer';
    }

    /**
     * {@inheritdoc}
     */
    public function getLabel()
    {
        return 'Footer';
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return '';
    }
}
