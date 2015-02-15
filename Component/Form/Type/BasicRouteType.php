<?php
/**
 * Created by Andy Thorne
 *
 * @author Andy Thorne <contrabandvr@gmail.com>
 */

namespace GravityCMS\Component\Form\Type;

use GravityCMS\Component\Form\DataTransformer\BasicRouteTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class BasicRouteType
 *
 * @package GravityCMS\Component\Form\Type
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class BasicRouteType extends AbstractType
{
    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'basic_route';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('path', 'text');

        $builder->addModelTransformer(new BasicRouteTransformer());
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GravityCMS\Component\Entity\Route'
        ));
    }
}
