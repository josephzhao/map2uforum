<?php

namespace Map2u\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Forum
 */
class Forum
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
     * @var array
     */
    private $readAuthorisedRoles;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $categories;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Forum
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
     * Set readAuthorisedRoles
     *
     * @param array $readAuthorisedRoles
     * @return Forum
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
     * Add categories
     *
     * @param \Map2u\ForumBundle\Entity\Category $categories
     * @return Forum
     */
    public function addCategory(\Map2u\ForumBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Map2u\ForumBundle\Entity\Category $categories
     */
    public function removeCategory(\Map2u\ForumBundle\Entity\Category $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
