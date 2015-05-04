<?php

namespace GravityCMS\CoreBundle\Form\Type;

use Gravity\NodeBundle\Entity\Node;
use Gravity\NodeBundle\Entity\NodeContent;
use GravityCMS\Component\Configuration\ConfigurationManager;
use GravityCMS\Component\Field\FieldInterface;
use GravityCMS\Component\Field\FieldManager;
use GravityCMS\CoreBundle\Entity\Entity;
use GravityCMS\CoreBundle\Entity\FieldData;
use GravityCMS\CoreBundle\Form\DataTransformer\FieldCollectionDataTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FieldCollectionType extends AbstractType
{
    /**
     * @var FieldManager
     */
    protected $fieldManager;

    /**
     * @var ConfigurationManager
     */
    protected $configManager;

    /**
     * @var string[]
     */
    protected $fieldLabels;

    /**
     * @param FieldManager         $fieldManager
     * @param ConfigurationManager $configManager
     */
    function __construct(FieldManager $fieldManager, ConfigurationManager $configManager)
    {
        $this->fieldManager  = $fieldManager;
        $this->configManager = $configManager;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $i = 0;
        if ($options['node'] instanceof Node) {
            $node          = $options['node'];
            $contentType   = $node->getContentType();
            $contents      = $node->getFields();
            $fieldContents = [];

            /** @var FieldData $content */
            foreach ($contents as $content) {
                $fieldContents[$content->getField()->getName()][] = $content;
            }

            foreach ($contentType->getFields() as $fieldEntity) {

                $field       = $this->fieldManager->getField($fieldEntity->getFieldType());
                $fieldWidget = $this->fieldManager->getFieldWidget($fieldEntity->getWidget()->getName());

                if ($field instanceof FieldInterface) {
                    $dataClass = $field->getEntityClass();
                    $formClass = $fieldWidget->getForm();

                    $fieldFormConfig = $fieldEntity->getConfig();

                    /** @var FieldData $entity */
                    if (array_key_exists($fieldEntity->getName(), $fieldContents)) {
                        $entities = $fieldContents[$fieldEntity->getName()];
                    } else {
                        $entity   = new $dataClass();
                        $entities = [$entity];
                    }

                    $this->fieldLabels[$i] = $fieldEntity;
                    $builder->add($i, 'field_data_collection', [
                        'type'         => $formClass,
                        'options'      => [
                            'label' => false,
                            'field' => $fieldEntity,
                        ],
                        'required'     => $fieldFormConfig->isRequired(),
                        'field'        => $fieldEntity,
                        'limit'        => (int)$fieldFormConfig->getLimit() ?: 1,
                        'label'        => false,
                        'allow_add'    => true,
                        'allow_delete' => true,
                        'data'         => $entities,
                        'by_reference' => false,
                    ]);
                    ++$i;
                }
            }
        }
        $builder->addModelTransformer(new FieldCollectionDataTransformer());
    }


    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'node'
        ]);
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['field_labels'] = $this->fieldLabels;
    }


    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'field_collection';
    }

    /**
     * @inheritdoc
     */
    public function getParent()
    {
        return 'form';
    }


} 
