<?php

namespace GravityCMS\NodeBundle\Field\Text;

use GravityCMS\Component\Field\AbstractField;
use GravityCMS\Component\Field\Display\DisplayInterface;
use GravityCMS\Component\Field\Widget\WidgetInterface;
use GravityCMS\NodeBundle\Field\Text\Configuration\TextFieldConfiguration;
use GravityCMS\NodeBundle\Field\Text\Display\TextFieldDisplay;
use GravityCMS\NodeBundle\Field\Text\Widget\TextFieldWidget;

class TextField extends AbstractField
{
    protected $widget;

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'text';
    }

    /**
     * {@inheritdoc}
     */
    public function getLabel()
    {
        return 'Text';
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
    public function getSettings()
    {
        return new TextFieldConfiguration();
    }

    /**
     * @return WidgetInterface
     */
    public function getDefaultWidget()
    {
        return new TextFieldWidget();
    }

    /**
     * @return DisplayInterface
     */
    public function getDefaultDisplay()
    {
        return new TextFieldDisplay();
    }

    /**
     * Get the entity class name for this field
     *
     * @return string
     */
    public function getEntityClass()
    {
        return 'GravityCMS\NodeBundle\Entity\FieldText';
    }
}
