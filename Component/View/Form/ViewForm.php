<?php

namespace GravityCMS\Component\View\Form;

use GravityCMS\Component\View\Form\DataTransformer\ViewDataTransformer;
use GravityCMS\Component\View\ViewManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class ViewForm
 *
 * @package GravityCMS\Component\View\Form
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class ViewForm extends AbstractType
{
    /**
     * @var ViewManager
     */
    protected $viewManager;

    function __construct(ViewManager $viewManager)
    {
        $this->viewManager = $viewManager;
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'gravity_cms_view';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $viewChoices = array();
        foreach($this->viewManager->getViews() as $view)
        {
            $viewChoices[$view->getName()] = $view->getLabel();
        }

        $builder
            ->add('name', 'text')
            ->add('route', 'basic_route')
            ->add('view_type', 'choice', array(
                'choices' => $viewChoices,
                'mapped' => false,
            ))
        ;

        $viewManager = $this->viewManager;
        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) use ($viewManager) {
            $event->getForm()->add('config');
            $data = $event->getData();

            $type = $viewManager->getView($data['view_type']);
            $data['config'] = $type->getConfiguration();
            $event->setData($data);
        });

        $builder->addModelTransformer(new ViewDataTransformer($this->viewManager));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_type' => '\GravityCMS\Component\Entity\View'
        ));
    }


}
