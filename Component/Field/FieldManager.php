<?php

namespace GravityCMS\Component\Field;

use GravityCMS\Component\Field\Display\DisplayInterface;
use GravityCMS\Component\Field\Widget\WidgetInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FieldManager
{
    /**
     * @var FieldInterface[]
     */
    protected $fields = [];

    /**
     * @var DisplayInterface[]
     */
    protected $fieldDisplays = [];

    /**
     * @var WidgetInterface[]
     */
    protected $fieldWidgets = [];

    /**
     * Add a field to the manager
     *
     * @param FieldInterface $field
     */
    public function addField(FieldInterface $field)
    {
        $this->fields[$field->getName()] = $field;
    }

    /**
     * @return FieldInterface[]
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param $name
     *
     * @return FieldInterface
     */
    public function getField($name)
    {
        if(array_key_exists($name, $this->fields))
        {
            return $this->fields[$name];
        }

        return null;
    }

    public function createField($name, array $options){
        $field = $this->getField($name);
        $optionResolver = new OptionsResolver();
        $field->setOptions($optionResolver, $options);
        $resolvedOptions = $optionResolver->resolve($options);
    }

    /**
     * Add a field widget to the manager
     *
     * @param WidgetInterface $widget
     */
    public function addFieldWidget(WidgetInterface $widget)
    {
        $this->fieldWidgets[$widget->getName()] = $widget;
    }

    /**
     * @return WidgetInterface[]
     */
    public function getFieldWidgets()
    {
        return $this->fieldWidgets;
    }

    /**
     * @param $name
     *
     * @return WidgetInterface
     */
    public function getFieldWidget($name)
    {
        if(array_key_exists($name, $this->fieldWidgets))
        {
            return $this->fieldWidgets[$name];
        }

        return null;
    }

    /**
     * Add a field widget to the manager
     *
     * @param DisplayInterface $widget
     */
    public function addFieldDisplay(DisplayInterface $widget)
    {
        $this->fieldDisplays[$widget->getName()] = $widget;
    }

    /**
     * @return DisplayInterface[]
     */
    public function getFieldDisplays()
    {
        return $this->fieldDisplays;
    }

    /**
     * @param $name
     *
     * @return DisplayInterface
     */
    public function getFieldDisplay($name)
    {
        if(array_key_exists($name, $this->fieldDisplays))
        {
            return $this->fieldDisplays[$name];
        }

        return null;
    }

} 
