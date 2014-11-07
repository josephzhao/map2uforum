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

use Map2u\ForumBundle\Model\Component\Manager\ManagerInterface;
use Map2u\ForumBundle\Model\Component\Manager\BaseManager;

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
class SubscriptionManager extends BaseManager implements ManagerInterface
{
    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Entity\Subscription
     */
    public function createSubscription()
    {
        return $this->gateway->createSubscription();
    }

    /**
     *
     * @access public
     * @param  int                                                 $topicId
     * @param  \Symfony\Component\Security\Core\User\UserInterface $userId
     * @return \Map2u\ForumBundle\Manager\ManagerInterface
     */
    public function subscribe(Topic $topic, UserInterface $user)
    {
        $subscription = $this->model->findOneSubscriptionForTopicByIdAndUserById($topic->getId(), $user->getId());

        if (! $subscription) {
            $subscription = new Subscription();
        }

        if (! $subscription->isSubscribed()) {
            $subscription->setSubscribed(true);
            $subscription->setOwnedBy($user);
            $subscription->setTopic($topic);
            $subscription->setRead(true);
            $subscription->setForum($topic->getBoard()->getCategory()->getForum());

            $this->gateway->saveSubscription($subscription);
        }

        return $this;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic             $topic
     * @param  int                                             $userId
     * @return \Map2u\ForumBundle\Manager\ManagerInterface
     */
    public function unsubscribe(Topic $topic, $userId)
    {
        $subscription = $this->model->findOneSubscriptionForTopicByIdAndUserById($topic->getId(), $userId);

        if (! $subscription) {
            return $this;
        }

        $subscription->setSubscribed(false);
        $subscription->setRead(true);

        $this->gateway->saveSubscription($subscription);

        return $this;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Subscription      $subscription
     * @return \Map2u\ForumBundle\Manager\ManagerInterface
     */
    public function markAsRead(Subscription $subscription)
    {
        $subscription->setRead(true);

        $this->persist($subscription)->flush();

        return $this;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Subscription      $subscription
     * @return \Map2u\ForumBundle\Manager\ManagerInterface
     */
    public function markAsUnread(Subscription $subscription)
    {
        $subscription->setRead(false);

        $this->persist($subscription)->flush();

        return $this;
    }

    /**
     *
     * @access public
     * @param  \Doctrine\Common\Collections\ArrayCollection        $subscriptions
     * @param  \Symfony\Component\Security\Core\User\UserInterface $exceptUser
     * @return \Map2u\ForumBundle\Manager\ManagerInterface
     */
    public function markTheseAsUnread($subscriptions, UserInterface $exceptUser)
    {
        foreach ($subscriptions as $subscription) {
            if ($subscription->getOwnedBy()) {
                if ($subscription->getOwnedBy()->getId() != $exceptUser->getId()) {
                    $subscription->setRead(false);

                    $this->persist($subscription);
                }
            }
        }

        $this->flush();
    }
}
