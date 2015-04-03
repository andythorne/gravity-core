<?php

namespace GravityCMS\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class FieldForm
 *
 * @package GravityCMS\CoreBundle\Form
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class FieldForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label', 'text')
            ->add('name', 'text')
            ->add('field_type', 'gravity_field_type')
            ->add('delta', 'hidden')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'GravityCMS\CoreBundle\Entity\Field'
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gravity_field';
    }
}
