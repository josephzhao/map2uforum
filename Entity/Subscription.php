<?php

namespace Map2u\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subscription
 */
class Subscription
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $isRead;

    /**
     * @var boolean
     */
    private $isSubscribed;

    /**
     * @var \Map2u\ForumBundle\Entity\Forum
     */
    private $forum;

    /**
     * @var \Map2u\ForumBundle\Entity\Topic
     */
    private $topic;

    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     */
    private $ownedBy;


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
     * Set isRead
     *
     * @param boolean $isRead
     * @return Subscription
     */
    public function setIsRead($isRead)
    {
        $this->isRead = $isRead;

        return $this;
    }

    /**
     * Get isRead
     *
     * @return boolean 
     */
    public function getIsRead()
    {
        return $this->isRead;
    }

    /**
     * Set isSubscribed
     *
     * @param boolean $isSubscribed
     * @return Subscription
     */
    public function setIsSubscribed($isSubscribed)
    {
        $this->isSubscribed = $isSubscribed;

        return $this;
    }

    /**
     * Get isSubscribed
     *
     * @return boolean 
     */
    public function getIsSubscribed()
    {
        return $this->isSubscribed;
    }

    /**
     * Set forum
     *
     * @param \Map2u\ForumBundle\Entity\Forum $forum
     * @return Subscription
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

    /**
     * Set topic
     *
     * @param \Map2u\ForumBundle\Entity\Topic $topic
     * @return Subscription
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
     * Set ownedBy
     *
     * @param \Application\Sonata\UserBundle\Entity\User $ownedBy
     * @return Subscription
     */
    public function setOwnedBy(\Application\Sonata\UserBundle\Entity\User $ownedBy = null)
    {
        $this->ownedBy = $ownedBy;

        return $this;
    }

    /**
     * Get ownedBy
     *
     * @return \Application\Sonata\UserBundle\Entity\User 
     */
    public function getOwnedBy()
    {
        return $this->ownedBy;
    }
}
