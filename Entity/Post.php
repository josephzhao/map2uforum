<?php

namespace Map2u\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 */
class Post
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $body;

    /**
     * @var \DateTime
     */
    private $createdDate;

    /**
     * @var \DateTime
     */
    private $editedDate;

    /**
     * @var boolean
     */
    private $isDeleted;

    /**
     * @var \DateTime
     */
    private $deletedDate;

    /**
     * @var \DateTime
     */
    private $unlockedDate;

    /**
     * @var \DateTime
     */
    private $unlockedUntilDate;

    /**
     * @var \Map2u\ForumBundle\Entity\Topic
     */
    private $topic;

    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     */
    private $createdBy;

    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     */
    private $editedBy;

    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     */
    private $deletedBy;

    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     */
    private $unlockedBy;


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
     * Set body
     *
     * @param string $body
     * @return Post
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return Post
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set editedDate
     *
     * @param \DateTime $editedDate
     * @return Post
     */
    public function setEditedDate($editedDate)
    {
        $this->editedDate = $editedDate;

        return $this;
    }

    /**
     * Get editedDate
     *
     * @return \DateTime 
     */
    public function getEditedDate()
    {
        return $this->editedDate;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     * @return Post
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return boolean 
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * Set deletedDate
     *
     * @param \DateTime $deletedDate
     * @return Post
     */
    public function setDeletedDate($deletedDate)
    {
        $this->deletedDate = $deletedDate;

        return $this;
    }

    /**
     * Get deletedDate
     *
     * @return \DateTime 
     */
    public function getDeletedDate()
    {
        return $this->deletedDate;
    }

    /**
     * Set unlockedDate
     *
     * @param \DateTime $unlockedDate
     * @return Post
     */
    public function setUnlockedDate($unlockedDate)
    {
        $this->unlockedDate = $unlockedDate;

        return $this;
    }

    /**
     * Get unlockedDate
     *
     * @return \DateTime 
     */
    public function getUnlockedDate()
    {
        return $this->unlockedDate;
    }

    /**
     * Set unlockedUntilDate
     *
     * @param \DateTime $unlockedUntilDate
     * @return Post
     */
    public function setUnlockedUntilDate($unlockedUntilDate)
    {
        $this->unlockedUntilDate = $unlockedUntilDate;

        return $this;
    }

    /**
     * Get unlockedUntilDate
     *
     * @return \DateTime 
     */
    public function getUnlockedUntilDate()
    {
        return $this->unlockedUntilDate;
    }

    /**
     * Set topic
     *
     * @param \Map2u\ForumBundle\Entity\Topic $topic
     * @return Post
     */
    public function setTopic(\Map2u\ForumBundle\Entity\Topic $topic = null)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get topic
     *
     * @return \Map2u\ForumBundle\Entity\Topic 
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set createdBy
     *
     * @param \Application\Sonata\UserBundle\Entity\User $createdBy
     * @return Post
     */
    public function setCreatedBy(\Application\Sonata\UserBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \Application\Sonata\UserBundle\Entity\User 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set editedBy
     *
     * @param \Application\Sonata\UserBundle\Entity\User $editedBy
     * @return Post
     */
    public function setEditedBy(\Application\Sonata\UserBundle\Entity\User $editedBy = null)
    {
        $this->editedBy = $editedBy;

        return $this;
    }

    /**
     * Get editedBy
     *
     * @return \Application\Sonata\UserBundle\Entity\User 
     */
    public function getEditedBy()
    {
        return $this->editedBy;
    }

    /**
     * Set deletedBy
     *
     * @param \Application\Sonata\UserBundle\Entity\User $deletedBy
     * @return Post
     */
    public function setDeletedBy(\Application\Sonata\UserBundle\Entity\User $deletedBy = null)
    {
        $this->deletedBy = $deletedBy;

        return $this;
    }

    /**
     * Get deletedBy
     *
     * @return \Application\Sonata\UserBundle\Entity\User 
     */
    public function getDeletedBy()
    {
        return $this->deletedBy;
    }

    /**
     * Set unlockedBy
     *
     * @param \Application\Sonata\UserBundle\Entity\User $unlockedBy
     * @return Post
     */
    public function setUnlockedBy(\Application\Sonata\UserBundle\Entity\User $unlockedBy = null)
    {
        $this->unlockedBy = $unlockedBy;

        return $this;
    }

    /**
     * Get unlockedBy
     *
     * @return \Application\Sonata\UserBundle\Entity\User 
     */
    public function getUnlockedBy()
    {
        return $this->unlockedBy;
    }
}
