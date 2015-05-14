<?php

namespace GravityCMS\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class FieldWidgetType
 *
 * @package GravityCMS\CoreBundle\Form\Type
 * @author Andy Thorne <contrabandvr@gmail.com>
 */
class FieldWidgetType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(['field']);
        $resolver->setAllowedTypes([
            'field' => 'GravityCMS\Component\Field\FieldReference',
        ]);
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'field_widget';
    }
}
