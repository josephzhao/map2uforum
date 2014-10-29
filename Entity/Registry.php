<?php

namespace Map2u\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Registry
 */
class Registry
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $cachedPostCount;

    /**
     * @var integer
     */
    private $cachedKarmaPositiveCount;

    /**
     * @var integer
     */
    private $cachedKarmaNegativeCount;

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
     * Set cachedPostCount
     *
     * @param integer $cachedPostCount
     * @return Registry
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
     * Set cachedKarmaPositiveCount
     *
     * @param integer $cachedKarmaPositiveCount
     * @return Registry
     */
    public function setCachedKarmaPositiveCount($cachedKarmaPositiveCount)
    {
        $this->cachedKarmaPositiveCount = $cachedKarmaPositiveCount;

        return $this;
    }

    /**
     * Get cachedKarmaPositiveCount
     *
     * @return integer 
     */
    public function getCachedKarmaPositiveCount()
    {
        return $this->cachedKarmaPositiveCount;
    }

    /**
     * Set cachedKarmaNegativeCount
     *
     * @param integer $cachedKarmaNegativeCount
     * @return Registry
     */
    public function setCachedKarmaNegativeCount($cachedKarmaNegativeCount)
    {
        $this->cachedKarmaNegativeCount = $cachedKarmaNegativeCount;

        return $this;
    }

    /**
     * Get cachedKarmaNegativeCount
     *
     * @return integer 
     */
    public function getCachedKarmaNegativeCount()
    {
        return $this->cachedKarmaNegativeCount;
    }

    /**
     * Set ownedBy
     *
     * @param \Application\Sonata\UserBundle\Entity\User $ownedBy
     * @return Registry
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
