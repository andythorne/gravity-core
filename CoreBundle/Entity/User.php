<?php

namespace GravityCMS\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="security_user")
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var Group[]
     */
    protected $groups;

    /**
     * @var Role[]
     */
    protected $rolesAsCollection;

    public function __construct()
    {
        parent::__construct();

        $this->roles = new ArrayCollection();
        $this->groups = new ArrayCollection();
    }

    function __toString()
    {
        return $this->username;
    }

    /**
     * Returns an ARRAY of Role objects with the default Role object appended.
     *
     * @return Role[]
     */
    public function getRoles()
    {
        return array_merge( $this->roles->toArray(), array( new Role( parent::ROLE_DEFAULT ) ) );
    }

    /**
     * Returns the true ArrayCollection of Roles.
     *
     * @return Role[]
     */
    public function getRolesCollection()
    {
        return $this->roles;
    }

    /**
     * Pass a string, get the desired Role object or null.
     *
     * @param string $role
     *
     * @return Role
     */
    public function getRole( $role )
    {
        foreach ( $this->getRoles() as $roleItem )
        {
            if ( $role == $roleItem->getRole() )
            {
                return $roleItem;
            }
        }
        return null;
    }

    /**
     * Pass a string, checks if we have that Role. Same functionality as getRole() except returns a real boolean.
     *
     * @param string $role
     *
     * @return boolean
     */
    public function hasRole( $role )
    {
        if ( $this->getRole( $role ) )
        {
            return true;
        }
        return false;
    }

    /**
     * Adds a Role OBJECT to the ArrayCollection. Can't type hint due to interface so throws Exception.
     *
     * @param Role $role
     *
     * @return void
     * @throws \Exception
     */
    public function addRole( $role )
    {
        if ( !$role instanceof Role )
        {
            throw new \Exception( "addRole takes a Role object as the parameter" );
        }

        if ( !$this->hasRole( $role->getRole() ) )
        {
            $this->roles->add( $role );
        }
    }

    /**
     * Pass a string, remove the Role object from collection.
     *
     * @param string $role
     *
     * @return void
     */
    public function removeRole( $role )
    {
        $roleElement = $this->getRole( $role );
        if ( $roleElement )
        {
            $this->roles->removeElement( $roleElement );
        }
    }

    /**
     * Pass an ARRAY of Role objects and will clear the collection and re-set it with new Roles.
     * Type hinted array due to interface.
     *
     * @param array $roles Of Role objects.
     *
     * @return void
     */
    public function setRoles( array $roles )
    {
        $this->roles->clear();
        foreach ( $roles as $role )
        {
            $this->addRole( $role );
        }
    }

    /**
     * Directly set the ArrayCollection of Roles. Type hinted as Collection which is the parent of (Array|Persistent)Collection.
     *
     * @param Collection $collection
     */
    public function setRolesCollection( Collection $collection )
    {
        $this->roles = $collection;
    }


}
