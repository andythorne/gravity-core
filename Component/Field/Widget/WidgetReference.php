<?php


namespace GravityCMS\Component\Field\Widget;

use GravityCMS\Component\Field\Field;
use GravityCMS\Component\Field\FieldSettingsInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class WidgetReference
 *
 * @package GravityCMS\Component\Field\Widget
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class WidgetReference
{
    /**
     * @var WidgetDefinitionInterface
     */
    protected $definition;

    /**
     * @var array
     */
    protected $settings;

    function __construct(WidgetDefinitionInterface $definition, array $widgetSettings)
    {
        $this->definition = $definition;
        $this->resolveOption($widgetSettings);
    }

    /**
     * @param array $options
     */
    protected function resolveOption($options)
    {
        $optionResolver = new OptionsResolver();
        $this->definition->setOptions($optionResolver, $options);
        $optionResolver->setDefaults(
            [
                'default' => null,
            ]
        );
        $resolvedOptions = $optionResolver->resolve($options);
        $this->settings  = $resolvedOptions;
    }

    /**
     * @return WidgetDefinitionInterface
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
}
