<?php


namespace GravityCMS\Component\Field\Widget;

use GravityCMS\Component\Field\FieldInterface;
use GravityCMS\Component\Field\FieldSettingsInterface;

/**
 * Class WidgetReference
 *
 * @package GravityCMS\Component\Field\Widget
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class WidgetReference
{
    /**
     * @var FieldInterface
     */
    protected $field;

    /**
     * @var FieldSettingsInterface
     */
    protected $fieldConfiguration;

    /**
     * @var WidgetInterface
     */
    protected $widget;

    /**
     * @var WidgetSettingsInterface
     */
    protected $widgetConfiguration;

    function __construct(
        FieldInterface $field,
        FieldSettingsInterface $fieldConfiguration,
        WidgetInterface $widget,
        WidgetSettingsInterface $widgetConfiguration
    ) {
        $this->field               = $field;
        $this->fieldConfiguration  = $fieldConfiguration;
        $this->widget              = $widget;
        $this->widgetConfiguration = $widgetConfiguration;
    }

    /**
     * @return FieldInterface
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @return FieldSettingsInterface
     */
    public function getFieldConfiguration()
    {
        return $this->fieldConfiguration;
    }

    /**
     * @return WidgetInterface
     */
    public function getWidget()
    {
        return $this->widget;
    }

    /**
     * @return WidgetSettingsInterface
     */
    public function getWidgetConfiguration()
    {
        return $this->widgetConfiguration;
    }
}
