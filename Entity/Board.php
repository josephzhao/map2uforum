<?php

namespace Map2u\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Board
 */
class Board
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
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $cachedTopicCount;

    /**
     * @var integer
     */
    private $cachedPostCount;

    /**
     * @var integer
     */
    private $listOrderPriority;

    /**
     * @var array
     */
    private $readAuthorisedRoles;

    /**
     * @var array
     */
    private $topicCreateAuthorisedRoles;

    /**
     * @var array
     */
    private $topicReplyAuthorisedRoles;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $topics;

    /**
     * @var \Map2u\ForumBundle\Entity\Category
     */
    private $category;

    /**
     * @var \Map2u\ForumBundle\Entity\Post
     */
    private $lastPost;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->topics = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Board
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
     * Set description
     *
     * @param string $description
     * @return Board
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set cachedTopicCount
     *
     * @param integer $cachedTopicCount
     * @return Board
     */
    public function setCachedTopicCount($cachedTopicCount)
    {
        $this->cachedTopicCount = $cachedTopicCount;

        return $this;
    }

    /**
     * Get cachedTopicCount
     *
     * @return integer 
     */
    public function getCachedTopicCount()
    {
        return $this->cachedTopicCount;
    }

    /**
     * Set cachedPostCount
     *
     * @param integer $cachedPostCount
     * @return Board
     */
    public function setCachedPostCount($cachedPostCount)
    {
        $this->cachedPostCount = $cachedPostCount;

        return $this;
    }

    /**
     * Get cachedPostCount
     *
     * @return integer 
     */
    public function getCachedPostCount()
    {
        return $this->cachedPostCount;
    }

    /**
     * Set listOrderPriority
     *
     * @param integer $listOrderPriority
     * @return Board
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
     * @return Board
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
     * Set topicCreateAuthorisedRoles
     *
     * @param array $topicCreateAuthorisedRoles
     * @return Board
     */
    public function setTopicCreateAuthorisedRoles($topicCreateAuthorisedRoles)
    {
        $this->topicCreateAuthorisedRoles = $topicCreateAuthorisedRoles;

        return $this;
    }

    /**
     * Get topicCreateAuthorisedRoles
     *
     * @return array 
     */
    public function getTopicCreateAuthorisedRoles()
    {
        return $this->topicCreateAuthorisedRoles;
    }

    /**
     * Set topicReplyAuthorisedRoles
     *
     * @param array $topicReplyAuthorisedRoles
     * @return Board
     */
    public function setTopicReplyAuthorisedRoles($topicReplyAuthorisedRoles)
    {
        $this->topicReplyAuthorisedRoles = $topicReplyAuthorisedRoles;

        return $this;
    }

    /**
     * Get topicReplyAuthorisedRoles
     *
     * @return array 
     */
    public function getTopicReplyAuthorisedRoles()
    {
        return $this->topicReplyAuthorisedRoles;
    }

    /**
     * Add topics
     *
     * @param \Map2u\ForumBundle\Entity\Topic $topics
     * @return Board
     */
    public function addTopic(\Map2u\ForumBundle\Entity\Topic $topics)
    {
        $this->topics[] = $topics;

        return $this;
    }

    /**
     * Remove topics
     *
     * @param \Map2u\ForumBundle\Entity\Topic $topics
     */
    public function removeTopic(\Map2u\ForumBundle\Entity\Topic $topics)
    {
        $this->topics->removeElement($topics);
    }

    /**
     * Get topics
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTopics()
    {
        return $this->topics;
    }

    /**
     * Set category
     *
     * @param \Map2u\ForumBundle\Entity\Category $category
     * @return Board
     */
    public function setCategory(\Map2u\ForumBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Map2u\ForumBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set lastPost
     *
     * @param \Map2u\ForumBundle\Entity\Post $lastPost
     * @return Board
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
}
