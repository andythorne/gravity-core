<?php


namespace GravityCMS\CoreBundle\Field\Number\Widget\NumberBox;

use GravityCMS\CoreBundle\Entity\Field;
use GravityCMS\CoreBundle\Field\Number\Configuration\NumberFieldConfiguration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class NumberBoxWidgetForm
 *
 * @package GravityCMS\CoreBundle\Field\Number\Widget\NumberBox
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class NumberBoxWidgetForm extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var Field $field */
        $field = $options['field'];
        /** @var NumberFieldConfiguration $fieldConfig */
        $fieldConfig = $field->getConfig();
        $limit       = $fieldConfig->getLimit();

        $builder
            ->add(
                'number',
                'number',
                [
                    'label' => $limit == 1 ? $field->getLabel() : false,
                    'attr'  => [
                        'class'      => 'form-control',
                        'data-limit' => $limit,
                        'step'       => $fieldConfig->getStep(),
                        'min'        => $fieldConfig->getMin(),
                        'max'        => $fieldConfig->getMax(),
                    ],
                ]
            );
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'GravityCMS\CoreBundle\Entity\FieldNumber',
            ]
        );
    }

    public function getParent()
    {
        return 'field_widget';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gravity_field_number_widget_numberbox';
    }
}

