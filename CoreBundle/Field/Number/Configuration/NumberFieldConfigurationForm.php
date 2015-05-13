<?php


namespace GravityCMS\CoreBundle\Field\Number\Configuration;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class NumberBoxWidgetConfigurationForm
 *
 * @package GravityCMS\CoreBundle\Field\Number\Widget\NumberBox\Configuration
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class NumberFieldConfigurationForm extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('step', 'number')
            ->add('min', 'number')
            ->add('max', 'number');
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            [
                'data_type' => '\GravityCMS\CoreBundle\Field\Number\Configuration\NumberFieldConfiguration'
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'gravity_field_number_configuration';
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'field_configuration';
    }

}
