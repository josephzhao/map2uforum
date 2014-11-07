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

namespace Map2u\ForumBundle\Model\FrontModel;

use Symfony\Component\Security\Core\User\UserInterface;
use Map2u\ForumBundle\Model\FrontModel\BaseModel;
use Map2u\ForumBundle\Model\FrontModel\ModelInterface;
use Map2u\ForumBundle\Entity\Subscription;
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
class SubscriptionModel extends BaseModel implements ModelInterface
{
    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Entity\Subscription
     */
    public function createSubscription()
    {
        return $this->getManager()->createSubscription();
    }

    /**
     *
     * @access public
     * @param  int                                          $userId
     * @param  bool                                         $canViewDeletedTopics
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findAllSubscriptionsForUserById($userId, $canViewDeletedTopics = false)
    {
        return $this->getRepository()->findAllSubscriptionsForUserById($userId, $canViewDeletedTopics);
    }

    /**
     *
     * @access public
     * @param  int                                          $topicId
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findAllSubscriptionsForTopicById($topicId)
    {
        return $this->getRepository()->findAllSubscriptionsForTopicById($topicId);
    }

    /**
     *
     * @access public
     * @param  int                                                      $userId
     * @param  int                                                      $page
     * @param  int                                                      $itemsPerPage
     * @param  string                                                   $filter
     * @param  bool                                                     $canViewDeletedTopics
     * @return \Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination
     */
    public function findAllSubscriptionsPaginatedForUserById($userId, $page, $itemsPerPage = 25, $filter = 'unread', $canViewDeletedTopics = false)
    {
        return $this->getRepository()->findAllSubscriptionsPaginatedForUserById($userId, $page, $itemsPerPage, $filter, $canViewDeletedTopics);
    }

    /**
     *
     * @access public
     * @param  int                                                      $forumId
     * @param  int                                                      $userId
     * @param  int                                                      $page
     * @param  int                                                      $itemsPerPage
     * @param  string                                                   $filter
     * @param  bool                                                     $canViewDeletedTopics
     * @return \Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination
     */
    public function findAllSubscriptionsPaginatedForUserByIdAndForumById($forumId, $userId, $page, $itemsPerPage = 25, $filter = 'unread', $canViewDeletedTopics = false)
    {
        return $this->getRepository()->findAllSubscriptionsPaginatedForUserByIdAndForumById($forumId, $userId, $page, $itemsPerPage, $filter, $canViewDeletedTopics);
    }

    /**
     *
     * @access public
     * @param  int                                        $topicId
     * @param  int                                        $userId
     * @return \Map2u\ForumBundle\Entity\Subscription
     */
    public function findOneSubscriptionForTopicByIdAndUserById($topicId, $userId)
    {
        return $this->getRepository()->findOneSubscriptionForTopicByIdAndUserById($topicId, $userId);
    }

    /**
     *
     * @access public
     * @param  int $topicId
     * @return int
     */
    public function countSubscriptionsForTopicById($topicId)
    {
        return $this->getRepository()->countSubscriptionsForTopicById($topicId);
    }

    /**
     *
     * @access public
     * @param  int                                                             $topicId
     * @param  \Symfony\Component\Security\Core\User\UserInterface             $userId
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function subscribe(Topic $topic, UserInterface $user)
    {
        return $this->getManager()->subscribe($topic, $user);
    }

    /**
     *
     * @access public
     * @param  int                                                             $topicId
     * @param  int                                                             $userId
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function unsubscribe(Topic $topic, $userId)
    {
        return $this->getManager()->unsubscribe($topic, $userId);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Subscription                      $subscription
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function markAsRead(Subscription $subscription)
    {
        return $this->getManager()->markAsRead($subscription);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Subscription                      $subscription
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function markAsUnread(Subscription $subscription)
    {
        return $this->getManager()->markAsUnread($subscription);
    }

    /**
     *
     * @access public
     * @param  \Doctrine\Common\Collections\ArrayCollection                    $subscriptions
     * @param  \Symfony\Component\Security\Core\User\UserInterface             $exceptUser
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function markTheseAsUnread($subscriptions, UserInterface $exceptUser)
    {
        return $this->getManager()->markTheseAsUnread($subscriptions, $exceptUser);
    }
}
