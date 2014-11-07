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

namespace Map2u\ForumBundle\Model\Component\Manager;

use Symfony\Component\Security\Core\User\UserInterface;

use Map2u\ForumBundle\Model\Component\Gateway\GatewayInterface;
use Map2u\ForumBundle\Model\Component\Manager\ManagerInterface;
use Map2u\ForumBundle\Model\Component\Manager\BaseManager;
use Map2u\ForumBundle\Component\Helper\PostLockHelper;

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
class TopicManager extends BaseManager implements ManagerInterface
{
    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Component\Helper\PostLockHelper $postLockHelper
     */
    protected $postLockHelper;

    /**
     *
     * @access public
     * @param \Map2u\ForumBundle\Gateway\GatewayInterface        $gateway
     * @param \Map2u\ForumBundle\Component\Helper\PostLockHelper $postLockHelper
     */
    public function __construct(GatewayInterface $gateway, PostLockHelper $postLockHelper)
    {
        $this->gateway = $gateway;
        $this->postLockHelper = $postLockHelper;
    }

    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Entity\Topic
     */
    public function createTopic()
    {
        return $this->gateway->createTopic();
    }

    /**
     *
     * Post must have a set topic for topic to be set  correctly.
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Post              $post
     * @return \Map2u\ForumBundle\Manager\ManagerInterface
     */
    public function saveTopic(Topic $topic)
    {
        $this->gateway->saveTopic($topic);

        return $this;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic             $topic
     * @return \Map2u\ForumBundle\Manager\ManagerInterface
     */
    public function updateTopic(Topic $topic)
    {
        $this->gateway->updateTopic($topic);

        return $this;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic             $topic
     * @return \Map2u\ForumBundle\Manager\ManagerInterface
     */
    public function incrementViewCounter(Topic $topic)
    {
        // set the new counters
        $topic->setCachedViewCount($topic->getCachedViewCount() + 1);

        $this->persist($topic)->flush();

        return $this;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic                 $topic
     * @param  \Symfony\Component\Security\Core\User\UserInterface $user
     * @return \Map2u\ForumBundle\Manager\ManagerInterface
     */
    public function softDelete(Topic $topic, UserInterface $user)
    {
        // Don't overwite previous users accountability.
        if (! $topic->getDeletedBy() && ! $topic->getDeletedDate()) {
            $topic->setDeleted(true);
            $topic->setDeletedBy($user);
            $topic->setDeletedDate(new \DateTime());

            // Close the topic as a precaution.
            $topic->setClosed(true);
            $topic->setClosedBy($user);
            $topic->setClosedDate(new \DateTime());

            // update the record before doing record counts
            $this->persist($topic)->flush();
        }

        return $this;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic             $topic
     * @return \Map2u\ForumBundle\Manager\ManagerInterface
     */
    public function restore(Topic $topic)
    {
        $topic->setDeleted(false);
        $topic->setDeletedBy(null);
        $topic->setDeletedDate(null);

        $this->persist($topic)->flush();

        return $this;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic             $topic
     * @return \Map2u\ForumBundle\Manager\ManagerInterface
     */
    public function sticky(Topic $topic, UserInterface $user)
    {
        $topic->setSticky(true);
        $topic->setStickiedBy($user);
        $topic->setStickiedDate(new \DateTime());

        $this->persist($topic)->flush();

        return $this;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic             $topic
     * @return \Map2u\ForumBundle\Manager\ManagerInterface
     */
    public function unsticky(Topic $topic)
    {
        $topic->setSticky(false);
        $topic->setStickiedBy(null);
        $topic->setStickiedDate(null);

        $this->persist($topic)->flush();

        return $this;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic                 $topic
     * @param  \Symfony\Component\Security\Core\User\UserInterface $user
     * @return \Map2u\ForumBundle\Manager\ManagerInterface
     */
    public function close(Topic $topic, UserInterface $user)
    {
        // Don't overwite previous users accountability.
        if (! $topic->getClosedBy() && ! $topic->getClosedDate()) {
            $topic->setClosed(true);
            $topic->setClosedBy($user);
            $topic->setClosedDate(new \DateTime());

            $this->persist($topic)->flush();
        }

        return $this;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic             $topic
     * @return \Map2u\ForumBundle\Manager\ManagerInterface
     */
    public function reopen(Topic $topic)
    {
        $topic->setClosed(false);
        $topic->setClosedBy(null);
        $topic->setClosedDate(null);

        if ($topic->isDeleted()) {
            $topic->setDeleted(false);
            $topic->setDeletedBy(null);
            $topic->setDeletedDate(null);
        }

        $this->persist($topic)->flush();

        return $this;
    }
}
