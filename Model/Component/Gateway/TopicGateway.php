<?php

/*
 * This file is part of the Map2u ForumBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/>
 *
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Map2u\ForumBundle\Model\Component\Gateway;

use Doctrine\ORM\QueryBuilder;
use Map2u\ForumBundle\Model\Component\Gateway\GatewayInterface;
use Map2u\ForumBundle\Model\Component\Gateway\BaseGateway;
use Map2u\ForumBundle\Entity\Topic;

/**
 *
 * @category Map2u
 * @package  ForumBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.0
 * @link     https://github.com/codeconsortium/Map2uForumBundle
 *
 */
class TopicGateway extends BaseGateway implements GatewayInterface
{
    /**
     *
     * @access private
     * @var string $queryAlias
     */
    protected $queryAlias = 't';

    /**
     *
     * @access public
     * @param  \Doctrine\ORM\QueryBuilder                   $qb
     * @param  Array                                        $parameters
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findTopic(QueryBuilder $qb = null, $parameters = null)
    {
        if (null == $qb) {
            $qb = $this->createSelectQuery();
        }

        return $this->one($qb, $parameters);
    }

    /**
     *
     * @access public
     * @param  \Doctrine\ORM\QueryBuilder                   $qb
     * @param  Array                                        $parameters
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findTopics(QueryBuilder $qb = null, $parameters = null)
    {
        if (null == $qb) {
            $qb = $this->createSelectQuery();
        }

        return $this->all($qb, $parameters);
    }

    /**
     *
     * @access public
     * @param  \Doctrine\ORM\QueryBuilder $qb
     * @param  Array                      $parameters
     * @return int
     */
    public function countTopics(QueryBuilder $qb = null, $parameters = null)
    {
        if (null == $qb) {
            $qb = $this->createCountQuery();
        }

        if (null == $parameters) {
            $parameters = array();
        }

        $qb->setParameters($parameters);

        try {
            return $qb->getQuery()->getSingleScalarResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return 0;
        }
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic                             $topic
     * @return \Map2u\ForumBundle\Model\Component\Gateway\GatewayInterface
     */
    public function saveTopic(Topic $topic)
    {
        $this->persist($topic)->flush();

        return $this;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic                             $topic
     * @return \Map2u\ForumBundle\Model\Component\Gateway\GatewayInterface
     */
    public function updateTopic(Topic $topic)
    {
        $this->persist($topic)->flush();

        return $this;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic                             $topic
     * @return \Map2u\ForumBundle\Model\Component\Gateway\GatewayInterface
     */
    public function deleteTopic(Topic $topic)
    {
        $this->remove($topic)->flush();

        return $this;
    }

    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Entity\Topic
     */
    public function createTopic()
    {
        return new $this->entityClass();
    }
}
