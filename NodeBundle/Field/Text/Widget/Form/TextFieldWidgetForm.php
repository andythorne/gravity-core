<?php

namespace GravityCMS\NodeBundle\Field\Text\Widget\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class TextFieldWidgetForm
 *
 * @package GravityCMS\NodeBundle\Field\Text\Widget\Form
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class TextFieldWidgetForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $limit = $options['content_type_field']->getConfig()->getLimit();
        $builder
            ->add('body', 'textarea', array(
                'label' => $limit == 1 ? null : $limit,
                'attr' => array(
                    'class' => 'form-control wysiwyg-editor',
                    'data-limit' => $limit,
                ),
            ));
    }

    /**
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'GravityCMS\NodeBundle\Entity\FieldText',
            )
        );

        $resolver->setRequired(array('content_type_field'));
        $resolver->setAllowedTypes(array(
            'content_type_field' => 'GravityCMS\NodeBundle\Entity\ContentTypeField',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gravity_field_text_widget';
    }
}
