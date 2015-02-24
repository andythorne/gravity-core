<?php

namespace GravityCMS\NodeBundle\Field\Text\Configuration\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class TextFieldSettingsForm
 *
 * @package GravityCMS\NodeBundle\Field\Text\Configuration\Form
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class TextFieldSettingsForm extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('limit', 'number');
    }

    /**
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'GravityCMS\NodeBundle\Field\Text\Configuration\TextFieldConfiguration',
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gravity_field_text_settings';
    }
}
