<?php

namespace GravityCMS\Component\View\Block\Configuration;

use GravityCMS\Component\Configuration\Form\ConfigurationSettingsForm;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class AbstractBlockConfigurationForm
 *
 * @package GravityCMS\Component\View\Block\Configuration
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
abstract class AbstractBlockConfigurationForm extends ConfigurationSettingsForm
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text');
        parent::buildForm($builder, $options);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_type' => '\GravityCMS\Component\View\Block\Configuration\AbstractBlockConfiguration',
        ));
    }
}
