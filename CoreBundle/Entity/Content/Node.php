<?php

namespace GravityCMS\CoreBundle\Entity\Content;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use GravityCMS\Component\Entity\AbstractEntity;
use GravityCMS\CoreBundle\Entity\Route;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="node")
 */
class Node extends AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var NodeData[]
     *
     * @ORM\OneToMany(targetEntity="NodeData", mappedBy="entity")
     */
    protected $content;

    /**
     * @var Route
     *
     * @ORM\ManyToOne(targetEntity="GravityCMS\CoreBundle\Entity\Route")
     */
    protected $route;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $description;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    protected $published = true;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="published_on")
     */
    protected $publishedOn;

    /**
     * @var UserInterface
     *
     * @ORM\ManyToOne(targetEntity="GravityCMS\CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="published_by_id")
     */
    protected $publishedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="created_on")
     */
    protected $createdOn;

    /**
     * @var UserInterface
     *
     * @ORM\ManyToOne(targetEntity="GravityCMS\CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="create_by_id")
     */
    protected $createdBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="edited_on")
     */
    protected $editedOn;

    /**
     * @var UserInterface
     *
     * @ORM\ManyToOne(targetEntity="GravityCMS\CoreBundle\Entity\User")
     * @ORM\JoinColumn(name="edited_by_id")
     */
    protected $editedBy;

    function __construct()
    {
        // setup default values
        $this->content = new ArrayCollection();
        $this->createdOn = new \DateTime();
        $this->publishedOn = new \DateTime();
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
