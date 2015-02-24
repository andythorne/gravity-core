<?php

namespace GravityCMS\NodeBundle\Field\Text\Configuration;

use GravityCMS\Component\Field\Configuration\FieldSettingsConfiguration;
use GravityCMS\NodeBundle\Field\Text\Configuration\Form\TextFieldSettingsForm;

/**
 * Class TextFieldConfiguration
 *
 * @package GravityCMS\NodeBundle\Field\Text\Configuration
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class TextFieldConfiguration extends FieldSettingsConfiguration
{

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'field.text';
    }

    /**
     * {@inheritdoc}
     */
    public function getForm()
    {
        return new TextFieldSettingsForm();
    }
} 
