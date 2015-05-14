<?php

namespace GravityCMS\Component\Field;

use GravityCMS\Component\Field\Display\DisplayInterface;
use GravityCMS\Component\Field\Widget\WidgetDefinitionInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class AbstractFieldDefinition implements FieldDefinitionInterface
{
    /**
     * @return WidgetDefinitionInterface
     */
    public function getDefaultWidget()
    {
    }

    /**
     * @return DisplayInterface
     */
    public function getDefaultDisplay()
    {
    }

    /**
     * @param OptionsResolver $optionsResolver
     *
     * @return void
     */
    public function setOptions(OptionsResolver $optionsResolver)
    {
    }
}
