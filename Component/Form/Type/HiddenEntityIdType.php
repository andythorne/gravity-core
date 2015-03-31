<?php

namespace GravityCMS\Component\Form\Type;

use Doctrine\ORM\EntityManager;
use GravityCMS\Component\Form\DataTransformer\HiddenEntityIdTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HiddenEntityIdType extends AbstractType
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver
            ->setRequired([
                'class',
            ])
            ->setDefaults([
                'em' => $this->entityManager,
            ])
            ->setAllowedTypes([
                'em' => 'Doctrine\Common\Persistence\ObjectManager',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        // this assumes that the entity manager was passed in as an option
        $entityManager = $options['em'];
        $dataClass = $options['class'];
        $transformer = new HiddenEntityIdTransformer($entityManager, $dataClass);

        $builder->addModelTransformer($transformer);
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'hidden';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'hidden_entity';
    }

}
