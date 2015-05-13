<?php

namespace GravityCMS\Component\Field;

use GravityCMS\Component\Field\Configuration\FieldSettingsConfiguration;
use GravityCMS\Component\Field\Display\DisplayInterface;
use GravityCMS\Component\Field\Widget\WidgetInterface;
use GravityCMS\Component\Field\Widget\WidgetSettingsInterface;

abstract class AbstractField implements FieldInterface
{
    /**
     * @var DisplayInterface
     */
    protected $display;

    /**
     * @var WidgetInterface
     */
    protected $widget;

    /**
     * @return DisplayInterface
     */
    public function getDisplay()
    {
        if(!$this->display instanceof DisplayInterface)
        {
            $this->display = $this->getDefaultDisplay();
        }

        return $this->display;
    }

    /**
     * @return WidgetInterface
     */
    public function getWidget()
    {
        if(!$this->widget instanceof WidgetInterface)
        {
            $this->widget = $this->getDefaultWidget();
        }

        return $this->widget;
    }

    /**
     * @return DisplayInterface
     */
    abstract protected function getDefaultDisplay();

    /**
     * @return WidgetInterface
     */
    abstract protected function getDefaultWidget();
}
