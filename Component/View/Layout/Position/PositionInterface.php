<?php

namespace GravityCMS\Component\View\Layout\Position;

/**
 * Interface PositionInterface
 *
 * @package GravityCMS\Component\View\Layout\Position
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
interface PositionInterface
{
    /**
     * Returns a string identifier for a position
     *
     * @return string
     */
    public function getName();

    /**
     * Returns a string label for a position
     *
     * @return string
     */
    public function getLabel();

    /**
     * (Optional) Returns a string descriptiopn of the position
     *
     * @return string
     */
    public function getDescription();
}
