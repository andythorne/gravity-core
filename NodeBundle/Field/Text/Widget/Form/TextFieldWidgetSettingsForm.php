<?php

namespace GravityCMS\NodeBundle\Field\Text\Widget\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class TextFieldWidgetSettingsForm
 *
 * @package GravityCMS\NodeBundle\Field\Text\Widget\Form
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class TextFieldWidgetSettingsForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('useEditor', 'checkbox', array(
                'required' => false,
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_type' => 'GravityCMS\NodeBundle\Entity\FieldText'
        ));
    }


    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'gravity_field_text_widget_settings';
    }

}
