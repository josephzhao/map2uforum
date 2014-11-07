<?php

namespace Map2u\ForumBundle\Entity;

use Map2u\ForumBundle\Entity\Model\Forum as AbstractForum;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Forum
 */
class Forum extends AbstractForum {

    /**
     *
     * @var integer $id
     */
    protected $id;

    /**
     *
     * @var integer $id
     */
    protected $name;

    /**
     *
     * @var array $readAuthorisedRoles
     */
    protected $readAuthorisedRoles;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $categories;

    /**
     *
     * @access public
     */
    public function __construct() {
        parent::__construct();

        // your own logic
        $this->readAuthorisedRoles = array();
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString() {
        return $this->name;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * set id
     *
     * @param integer $id
     *   @return Forum
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set name
     *
     * @return Forum
     */
    public function setName($name) {
        return $this->name = $name;
    }

    /**
     *
     * @return array
     */
    public function getReadAuthorisedRoles() {
        return $this->readAuthorisedRoles;
    }

    /**
     *
     * @param  array $roles
     * @return Board
     */
    public function setReadAuthorisedRoles(array $roles = null) {
        $this->readAuthorisedRoles = $roles;

        return $this;
    }

    /**
     *
     * @param $role
     * @return bool
     */
    public function hasReadAuthorisedRole($role) {
        return in_array($role, $this->readAuthorisedRoles);
    }

    /**
     *
     * @param  SecurityContextInterface $securityContext
     * @return bool
     */
    public function isAuthorisedToRead(SecurityContextInterface $securityContext) {
        if (0 == count($this->readAuthorisedRoles)) {
            return true;
        }

        foreach ($this->readAuthorisedRoles as $role) {
            if ($securityContext->isGranted($role)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Add categories
     *
     * @param \Map2u\ForumBundle\Entity\Category $categories
     * @return Forum
     */
    public function addCategory(\Map2u\ForumBundle\Entity\Category $categories) {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Map2u\ForumBundle\Entity\Category $categories
     */
    public function removeCategory(\Map2u\ForumBundle\Entity\Category $categories) {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories() {
        return $this->categories;
    }

}
