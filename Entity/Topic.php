<?php

namespace Map2u\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Topic
 */
class Topic
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var integer
     */
    private $cachedViewCount;

    /**
     * @var integer
     */
    private $cachedReplyCount;

    /**
     * @var boolean
     */
    private $isClosed;

    /**
     * @var \DateTime
     */
    private $closedDate;

    /**
     * @var boolean
     */
    private $isDeleted;

    /**
     * @var \DateTime
     */
    private $deletedDate;

    /**
     * @var boolean
     */
    private $isSticky;

    /**
     * @var \DateTime
     */
    private $stickiedDate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $posts;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $subscriptions;

    /**
     * @var \Map2u\ForumBundle\Entity\Board
     */
    private $board;

    /**
     * @var \Map2u\ForumBundle\Entity\Post
     */
    private $firstPost;

    /**
     * @var \Map2u\ForumBundle\Entity\Post
     */
    private $lastPost;

    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     */
    private $closedBy;

    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     */
    private $deletedBy;

    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     */
    private $stickiedBy;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->subscriptions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Topic
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set cachedViewCount
     *
     * @param integer $cachedViewCount
     * @return Topic
     */
    public function setCachedViewCount($cachedViewCount)
    {
        $this->cachedViewCount = $cachedViewCount;

        return $this;
    }

    /**
     * Get cachedViewCount
     *
     * @return integer 
     */
    public function getCachedViewCount()
    {
        return $this->cachedViewCount;
    }

    /**
     * Set cachedReplyCount
     *
     * @param integer $cachedReplyCount
     * @return Topic
     */
    public function setCachedReplyCount($cachedReplyCount)
    {
        $this->cachedReplyCount = $cachedReplyCount;

        return $this;
    }

    /**
     * Get cachedReplyCount
     *
     * @return integer 
     */
    public function getCachedReplyCount()
    {
        return $this->cachedReplyCount;
    }

    /**
     * Set isClosed
     *
     * @param boolean $isClosed
     * @return Topic
     */
    public function setIsClosed($isClosed)
    {
        $this->isClosed = $isClosed;

        return $this;
    }

    /**
     * Get isClosed
     *
     * @return boolean 
     */
    public function getIsClosed()
    {
        return $this->isClosed;
    }

    /**
     * Set closedDate
     *
     * @param \DateTime $closedDate
     * @return Topic
     */
    public function setClosedDate($closedDate)
    {
        $this->closedDate = $closedDate;

        return $this;
    }

    /**
     * Get closedDate
     *
     * @return \DateTime 
     */
    public function getClosedDate()
    {
        return $this->closedDate;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     * @return Topic
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
     * @return Topic
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
     * Set isSticky
     *
     * @param boolean $isSticky
     * @return Topic
     */
    public function setIsSticky($isSticky)
    {
        $this->isSticky = $isSticky;

        return $this;
    }

    /**
     * Get isSticky
     *
     * @return boolean 
     */
    public function getIsSticky()
    {
        return $this->isSticky;
    }

    /**
     * Set stickiedDate
     *
     * @param \DateTime $stickiedDate
     * @return Topic
     */
    public function setStickiedDate($stickiedDate)
    {
        $this->stickiedDate = $stickiedDate;

        return $this;
    }

    /**
     * Get stickiedDate
     *
     * @return \DateTime 
     */
    public function getStickiedDate()
    {
        return $this->stickiedDate;
    }

    /**
     * Add posts
     *
     * @param \Map2u\ForumBundle\Entity\Post $posts
     * @return Topic
     */
    public function addPost(\Map2u\ForumBundle\Entity\Post $posts)
    {
        $this->posts[] = $posts;

        return $this;
    }

    /**
     * Remove posts
     *
     * @param \Map2u\ForumBundle\Entity\Post $posts
     */
    public function removePost(\Map2u\ForumBundle\Entity\Post $posts)
    {
        $this->posts->removeElement($posts);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Add subscriptions
     *
     * @param \Map2u\ForumBundle\Entity\Subscription $subscriptions
     * @return Topic
     */
    public function addSubscription(\Map2u\ForumBundle\Entity\Subscription $subscriptions)
    {
        $this->subscriptions[] = $subscriptions;

        return $this;
    }

    /**
     * Remove subscriptions
     *
     * @param \Map2u\ForumBundle\Entity\Subscription $subscriptions
     */
    public function removeSubscription(\Map2u\ForumBundle\Entity\Subscription $subscriptions)
    {
        $this->subscriptions->removeElement($subscriptions);
    }

    /**
     * Get subscriptions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    /**
     * Set board
     *
     * @param \Map2u\ForumBundle\Entity\Board $board
     * @return Topic
     */
    public function setBoard(\Map2u\ForumBundle\Entity\Board $board = null)
    {
        $this->board = $board;

        return $this;
    }

    /**
     * Get board
     *
     * @return \Map2u\ForumBundle\Entity\Board 
     */
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * Set firstPost
     *
     * @param \Map2u\ForumBundle\Entity\Post $firstPost
     * @return Topic
     */
    public function setFirstPost(\Map2u\ForumBundle\Entity\Post $firstPost = null)
    {
        $this->firstPost = $firstPost;

        return $this;
    }

    /**
     * Get firstPost
     *
     * @return \Map2u\ForumBundle\Entity\Post 
     */
    public function getFirstPost()
    {
        return $this->firstPost;
    }

    /**
     * Set lastPost
     *
     * @param \Map2u\ForumBundle\Entity\Post $lastPost
     * @return Topic
     */
    public function setLastPost(\Map2u\ForumBundle\Entity\Post $lastPost = null)
    {
        $this->lastPost = $lastPost;

        return $this;
    }

    /**
     * Get lastPost
     *
     * @return \Map2u\ForumBundle\Entity\Post 
     */
    public function getLastPost()
    {
        return $this->lastPost;
    }

    /**
     * Set closedBy
     *
     * @param \Application\Sonata\UserBundle\Entity\User $closedBy
     * @return Topic
     */
    public function setClosedBy(\Application\Sonata\UserBundle\Entity\User $closedBy = null)
    {
        $this->closedBy = $closedBy;

        return $this;
    }

    /**
     * Get closedBy
     *
     * @return \Application\Sonata\UserBundle\Entity\User 
     */
    public function getClosedBy()
    {
        return $this->closedBy;
    }

    /**
     * Set deletedBy
     *
     * @param \Application\Sonata\UserBundle\Entity\User $deletedBy
     * @return Topic
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
     * Set stickiedBy
     *
     * @param \Application\Sonata\UserBundle\Entity\User $stickiedBy
     * @return Topic
     */
    public function setStickiedBy(\Application\Sonata\UserBundle\Entity\User $stickiedBy = null)
    {
        $this->stickiedBy = $stickiedBy;

        return $this;
    }

    /**
     * Get stickiedBy
     *
     * @return \Application\Sonata\UserBundle\Entity\User 
     */
    public function getStickiedBy()
    {
        return $this->stickiedBy;
    }
}
