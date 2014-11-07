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

namespace Map2u\ForumBundle\Component\Dispatcher\Listener;

use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

use Map2u\ForumBundle\Component\Dispatcher\ForumEvents;
use Map2u\ForumBundle\Component\Dispatcher\Event\UserTopicEvent;

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
class SubscriberListener implements EventSubscriberInterface
{
    /**
     *
     * @access private
     * @var \Map2u\ForumBundle\Model\FrontModel\SubscriptionModel $subscriptionModel
     */
    protected $subscriptionModel;

    /**
     *
     * @access protected
     * @var \Symfony\Component\Security\Core\SecurityContext $securityContext
     */
    protected $securityContext;

    /**
     *
     * @access public
     * @param \Map2u\ForumBundle\Model\FrontModel\SubscriptionModel $subscriptionModel
     * @param \Symfony\Component\Security\Core\SecurityContext          $securityContext
     */
    public function __construct($subscriptionModel, SecurityContext $securityContext)
    {
        $this->subscriptionModel = $subscriptionModel;
        $this->securityContext = $securityContext;
    }

    /**
     *
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            ForumEvents::USER_TOPIC_CREATE_COMPLETE      => 'onTopicCreateComplete',
            ForumEvents::USER_TOPIC_REPLY_COMPLETE       => 'onTopicReplyComplete'
        );
    }

    /**
     *
     * @access public
     * @param \Map2u\ForumBundle\Component\Dispatcher\Event\UserTopicEvent $event
     */
    public function onTopicCreateComplete(UserTopicEvent $event)
    {
        if ($event->getTopic()) {
            if ($event->getTopic()->getId() && $event->authorWantsToSubscribe()) {
                $user = $this->securityContext->getToken()->getUser();

                $this->subscriptionModel->subscribe($event->getTopic(), $user);
            }
        }
    }

    /**
     *
     * @access public
     * @param \Map2u\ForumBundle\Component\Dispatcher\Event\UserTopicEvent $event
     */
    public function onTopicReplyComplete(UserTopicEvent $event)
    {
        if ($event->getTopic()) {
            if ($event->getTopic()->getId()) {
                $user = $this->securityContext->getToken()->getUser();

                if ($event->authorWantsToSubscribe()) {
                    $this->subscriptionModel->subscribe($event->getTopic(), $user);
                }

                $subscriptions = $this->subscriptionModel->findAllSubscriptionsForTopicById($event->getTopic()->getId());

                $this->subscriptionModel->markTheseAsUnread($subscriptions, $user);
            }
        }
    }
}
