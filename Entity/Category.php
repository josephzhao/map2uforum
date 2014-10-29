<?php

namespace Map2u\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 */
class Category
{
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
    private $boards;

    /**
     * @var \Map2u\ForumBundle\Entity\Forum
     */
    private $forum;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->boards = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set listOrderPriority
     *
     * @param integer $listOrderPriority
     * @return Category
     */
    public function setListOrderPriority($listOrderPriority)
    {
        $this->listOrderPriority = $listOrderPriority;

        return $this;
    }

    /**
     * Get listOrderPriority
     *
     * @return integer 
     */
    public function getListOrderPriority()
    {
        return $this->listOrderPriority;
    }

    /**
     * Set readAuthorisedRoles
     *
     * @param array $readAuthorisedRoles
     * @return Category
     */
    public function setReadAuthorisedRoles($readAuthorisedRoles)
    {
        $this->readAuthorisedRoles = $readAuthorisedRoles;

        return $this;
    }

    /**
     * Get readAuthorisedRoles
     *
     * @return array 
     */
    public function getReadAuthorisedRoles()
    {
        return $this->readAuthorisedRoles;
    }

    /**
     * Add boards
     *
     * @param \Map2u\ForumBundle\Entity\Board $boards
     * @return Category
     */
    public function addBoard(\Map2u\ForumBundle\Entity\Board $boards)
    {
        $this->boards[] = $boards;

        return $this;
    }

    /**
     * Remove boards
     *
     * @param \Map2u\ForumBundle\Entity\Board $boards
     */
    public function removeBoard(\Map2u\ForumBundle\Entity\Board $boards)
    {
        $this->boards->removeElement($boards);
    }

    /**
     * Get boards
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBoards()
    {
        return $this->boards;
    }

    /**
     * Set forum
     *
     * @param \Map2u\ForumBundle\Entity\Forum $forum
     * @return Category
     */
    public function setForum(\Map2u\ForumBundle\Entity\Forum $forum = null)
    {
        $this->forum = $forum;

        return $this;
    }

    /**
     * Get forum
     *
     * @return \Map2u\ForumBundle\Entity\Forum 
     */
    public function getForum()
    {
        return $this->forum;
    }
}
