<?php


namespace GravityCMS\CoreBundle\Entity\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use GravityCMS\Component\Field\FieldManager;
use GravityCMS\CoreBundle\Entity\Field;
use GravityCMS\CoreBundle\Entity\FieldDisplay;
use GravityCMS\CoreBundle\Entity\FieldWidget;

/**
 * Class FieldDisplayEntityService
 *
 * @package GravityCMS\CoreBundle\Entity\Service
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class FieldDisplayEntityService implements EntityServiceInterface
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var EntityRepository
     */
    protected $entityRepository;

    /**
     * @var FieldManager
     */
    protected $fieldManager;

    /**
     * @param EntityManager $entityManager
     * @param FieldManager  $fieldManager
     */
    function __construct(EntityManager $entityManager, FieldManager $fieldManager)
    {
        $this->entityManager    = $entityManager;
        $this->entityRepository = $entityManager->getRepository('GravityCMSCoreBundle:FieldDisplay');
        $this->fieldManager     = $fieldManager;
    }

    /**
     * @return EntityRepository
     */
    public function getEntityRepository()
    {
        return $this->entityRepository;
    }

    /**
     * Create a field entity
     *
     * @return Field
     */
    public function create()
    {
        return new FieldDisplay();
    }

    /**
     * @param FieldWidget $entity
     *
     * @return bool
     */
    public function persist($entity)
    {
        $this->entityManager->persist($entity);

        return true;
    }

    /**
     * Remove an instance of the entity
     *
     * @param object $entity
     *
     * @return bool
     */
    public function remove($entity)
    {
        $this->entityManager->remove($entity);
    }
}
