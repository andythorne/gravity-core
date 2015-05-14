<?php


namespace GravityCMS\Component\Field;

use GravityCMS\Component\Field\Widget\WidgetReference;

/**
 * Class FieldReference
 *
 * @package GravityCMS\Component\Field
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class FieldReference
{
    /**
     * @var FieldDefinitionInterface
     */
    protected $definition;

    /**
     * @var array
     */
    protected $settings;

    /**
     * @var WidgetReference
     */
    protected $widget;

    /**
     * @var string
     */
    protected $name;

    /**
     * @param string                   $name
     * @param FieldDefinitionInterface $definition
     * @param array                    $settings
     */
    function __construct($name, FieldDefinitionInterface $definition, array $settings)
    {
        $this->name       = $name;
        $this->definition = $definition;
        $this->settings   = $settings;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return FieldDefinitionInterface
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * @return array
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @return WidgetReference
     */
    public function getWidget()
    {
        return $this->widget;
    }

    /**
     * @param WidgetReference $widget
     */
    public function setWidget(WidgetReference $widget)
    {
        $this->widget = $widget;
    }
}