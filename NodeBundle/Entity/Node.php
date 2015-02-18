<?php

namespace GravityCMS\NodeBundle\Entity;

use GravityCMS\Component\Entity\AbstractEntity;
use GravityCMS\CoreBundle\Entity\Route;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class Node
 *
 * @package GravityCMS\NodeBundle\Entity
 * @author  Andy Thorne <contrabandvr@gmail.com>
 */
class Node extends AbstractEntity
{

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var Route
     */
    protected $route;

    /**
     * @var ContentType
     */
    protected $contentType;

    /**
     * @var NodeContent[]
     */
    protected $fields;

    /**
     * @var boolean
     */
    protected $published = true;

    /**
     * @var \DateTime
     */
    protected $publishedOn;

    /**
     * @var UserInterface
     */
    protected $publishedBy;

    /**
     * @var \DateTime
     */
    protected $createdOn;

    /**
     * @var UserInterface
     */
    protected $createdBy;

    /**
     * @var UserInterface
     */
    protected $deletedBy;

    /**
     * @var \DateTime
     */
    protected $deletedOn;

    /**
     * @var UserInterface
     */
    protected $editedBy;

    /**
     * @var \DateTime
     */
    protected $editedOn;


    function __construct()
    {
        parent::__construct();
        // setup default values
        $this->createdOn = new \DateTime();
        $this->publishedOn = new \DateTime();
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param ContentType $contentType
     */
    public function setContentType(ContentType $contentType)
    {
        $this->contentType = $contentType;
    }

    /**
     * @return ContentType
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param UserInterface $createdBy
     */
    public function setCreatedBy(UserInterface $createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * @return UserInterface
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param \DateTime $createdOn
     */
    public function setCreatedOn(\DateTime $createdOn)
    {
        $this->createdOn = $createdOn;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * a@param UserInterface $deletedBy
     */
    public function setDeletedBy(UserInterface $deletedBy)
    {
        $this->deletedBy = $deletedBy;
    }

    /**
     * @return UserInterface
     */
    public function getDeletedBy()
    {
        return $this->deletedBy;
    }

    /**
     * @param \DateTime $deletedOn
     */
    public function setDeletedOn(\DateTime $deletedOn)
    {
        $this->deletedOn = $deletedOn;
    }

    /**
     * @return \DateTime
     */
    public function getDeletedOn()
    {
        return $this->deletedOn;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param UserInterface $editedBy
     */
    public function setEditedBy(UserInterface $editedBy)
    {
        $this->editedBy = $editedBy;
    }

    /**
     * @return UserInterface
     */
    public function getEditedBy()
    {
        return $this->editedBy;
    }

    /**
     * @param \DateTime $editedOn
     */
    public function setEditedOn(\DateTime $editedOn)
    {
        $this->editedOn = $editedOn;
    }

    /**
     * @return \DateTime
     */
    public function getEditedOn()
    {
        return $this->editedOn;
    }

    /**
     * @return Route
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param Route $route
     */
    public function setRoute(Route $route)
    {
        $this->route = $route;
    }

    /**
     * @param boolean $published
     */
    public function setPublished($published)
    {
        $this->published = $published;
    }

    /**
     * @return boolean
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @param UserInterface $publishedBy
     */
    public function setPublishedBy(UserInterface $publishedBy)
    {
        $this->publishedBy = $publishedBy;
    }

    /**
     * @return UserInterface
     */
    public function getPublishedBy()
    {
        return $this->publishedBy;
    }

    /**
     * @param \DateTime $publishedOn
     */
    public function setPublishedOn(\DateTime $publishedOn)
    {
        $this->publishedOn = $publishedOn;
    }

    /**
     * @return \DateTime
     */
    public function getPublishedOn()
    {
        return $this->publishedOn;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
} 
