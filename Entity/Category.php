<?php

namespace Map2u\ForumBundle\Entity;

use Map2u\ForumBundle\Entity\Model\Category as AbstractCategory;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 */
class Category extends AbstractCategory {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $listOrderPriority;

    /**
     * @var array
     */
    private $readAuthorisedRoles;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $boards;

    /**
     * @var \Map2u\ForumBundle\Entity\Forum
     */
    protected $forum;

    /**
     * Constructor
     */
    public function __construct() {
        $this->boards = new \Doctrine\Common\Collections\ArrayCollection();
        $this->readAuthorisedRoles = array();
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
     *   @return Category
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name) {
        $this->name = $name;

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
     * Set listOrderPriority
     *
     * @param integer $listOrderPriority
     * @return Category
     */
    public function setListOrderPriority($listOrderPriority) {
        $this->listOrderPriority = $listOrderPriority;

        return $this;
    }

    /**
     * Get listOrderPriority
     *
     * @return integer 
     */
    public function getListOrderPriority() {
        return $this->listOrderPriority;
    }

    /**
     * Set readAuthorisedRoles
     *
     * @param array $readAuthorisedRoles
     * @return Category
     */
    public function setReadAuthorisedRoles($readAuthorisedRoles) {
        $this->readAuthorisedRoles = $readAuthorisedRoles;

        return $this;
    }

    /**
     * Get readAuthorisedRoles
     *
     * @return array 
     */
    public function getReadAuthorisedRoles() {
        return $this->readAuthorisedRoles;
    }

    /**
     * Add boards
     *
     * @param \Map2u\ForumBundle\Entity\Board $boards
     * @return Category
     */
    public function addBoard(\Map2u\ForumBundle\Entity\Board $boards) {
        $this->boards[] = $boards;

        return $this;
    }

    /**
     * Remove boards
     *
     * @param \Map2u\ForumBundle\Entity\Board $boards
     */
    public function removeBoard(\Map2u\ForumBundle\Entity\Board $boards) {
        $this->boards->removeElement($boards);
    }

    /**
     * Get boards
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBoards() {
        return $this->boards;
    }

    /**
     * Set forum
     *
     * @param \Map2u\ForumBundle\Entity\Forum $forum
     * @return Category
     */
    public function setForum(\Map2u\ForumBundle\Entity\Forum $forum = null) {
        $this->forum = $forum;

        return $this;
    }

    /**
     * Get forum
     *
     * @return \Map2u\ForumBundle\Entity\Forum 
     */
    public function getForum() {
        return $this->forum;
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

    public function __toString() {
        return $this->name;
    }

    public function forumName() {
        if ($this->getForum()) {
            return $this->getForum()->getName();
        }

        return 'Unassigned';
    }

}
