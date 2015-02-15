<?php

namespace GravityCMS\Component\View\Layout\Position;

/**
 * Class ContentPosition
 *
 * @package GravityCMS\Component\View\Layout\Position
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class ContentPosition implements PositionInterface
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'content';
    }

    /**
     * {@inheritdoc}
     */
    public function getLabel()
    {
        return 'Content';
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return '';
    }
}
