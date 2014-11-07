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

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Map2u\ForumBundle\Component\Dispatcher\ForumEvents;
use Map2u\ForumBundle\Component\Dispatcher\Event\ModeratorTopicEvent;
use Map2u\ForumBundle\Component\Dispatcher\Event\ModeratorTopicMoveEvent;
use Map2u\ForumBundle\Component\Dispatcher\Event\UserTopicEvent;
use Map2u\ForumBundle\Model\FrontModel\ModelInterface;
use Map2u\ForumBundle\Entity\Board;
use Map2u\ForumBundle\Entity\Topic;
use Map2u\ForumBundle\Entity\Post;

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
class StatListener implements EventSubscriberInterface
{
    /**
     *
     * @access private
     * @var \Map2u\ForumBundle\Model\FrontModel\BoardModel $boardModel
     */
    protected $boardModel;

    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Model\FrontModel\TopicModel $topicModel
     */
    protected $topicModel;

    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Model\FrontModel\PostModel $postModel
     */
    protected $postModel;

    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Model\FrontModel\RegistryModel $registryModel
     */
    protected $registryModel;

    /**
     *
     * @access public
     * @param \Map2u\ForumBundle\Model\FrontModel\boardModel    $boardModel
     * @param \Map2u\ForumBundle\Model\FrontModel\topicModel    $topicModel
     * @param \Map2u\ForumBundle\Model\FrontModel\PostModel     $postModel
     * @param \Map2u\ForumBundle\Model\FrontModel\RegistryModel $registryModel
     */
    public function __construct(ModelInterface $boardModel, ModelInterface $topicModel, ModelInterface $postModel, ModelInterface $registryModel)
    {
        $this->boardModel = $boardModel;
        $this->topicModel = $topicModel;
        $this->postModel = $postModel;
        $this->registryModel = $registryModel;
    }

    /**
     *
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            ForumEvents::USER_TOPIC_CREATE_COMPLETE            => 'onTopicCreateComplete',
            ForumEvents::USER_TOPIC_REPLY_COMPLETE             => 'onTopicReplyComplete',
            ForumEvents::MODERATOR_TOPIC_SOFT_DELETE_COMPLETE  => 'onTopicSoftDeleteComplete',
            ForumEvents::MODERATOR_TOPIC_RESTORE_COMPLETE      => 'onTopicRestoreComplete',
            ForumEvents::MODERATOR_TOPIC_CHANGE_BOARD_COMPLETE => 'onTopicChangeBoardComplete',
        );
    }

    /**
     *
     * @access public
     * @param \Map2u\ForumBundle\Component\Dispatcher\Event\UserTopicEvent $event
     */
    public function onTopicCreateComplete(UserTopicEvent $event)
    {
        $this->updateBoardStats($this->extractBoardFromTopic($event->getTopic()));
        $this->updateRegistryStats($event->getTopic()->getFirstPost());
    }

    /**
     *
     * @access public
     * @param \Map2u\ForumBundle\Component\Dispatcher\Event\UserTopicEvent $event
     */
    public function onTopicReplyComplete(UserTopicEvent $event)
    {
        $this->updateTopicStats($event->getTopic());
        $this->updateBoardStats($this->extractBoardFromTopic($event->getTopic()));
        $this->updateRegistryStats($event->getTopic()->getLastPost());
    }

    /**
     *
     * @access public
     * @param \Map2u\ForumBundle\Component\Dispatcher\Event\ModeratorTopicEvent $event
     */
    public function onTopicSoftDeleteComplete(ModeratorTopicEvent $event)
    {
        $this->updateBoardStats($this->extractBoardFromTopic($event->getTopic()));
    }

    /**
     *
     * @access public
     * @param \Map2u\ForumBundle\Component\Dispatcher\Event\ModeratorTopicEvent $event
     */
    public function onTopicRestoreComplete(ModeratorTopicEvent $event)
    {
        $this->updateBoardStats($this->extractBoardFromTopic($event->getTopic()));
    }

    /**
     *
     * @access public
     * @param \Map2u\ForumBundle\Component\Dispatcher\Event\ModeratorTopicMoveEvent $event
     */
    public function onTopicChangeBoardComplete(ModeratorTopicMoveEvent $event)
    {
        $this->updateBoardStats($event->getOldBoard());
        $this->updateBoardStats($event->getNewBoard());
    }

    /**
     *
     * @access protected
     * @param \Map2u\ForumBundle\Entity\Topic $topic
     */
    protected function updateTopicStats(Topic $topic)
    {
        if ($topic->getId()) {
            // Get stats.
            $topicPostCount = $this->postModel->countPostsForTopicById($topic->getId());
            $topicFirstPost = $this->postModel->getFirstPostForTopicById($topic->getId());
            $topicLastPost = $this->postModel->getLastPostForTopicById($topic->getId());

            // Set the board / topic last post.
            $topic->setCachedReplyCount($topicPostCount > 0 ? --$topicPostCount : 0);
            $topic->setFirstPost($topicFirstPost ?: null);
            $topic->setLastPost($topicLastPost ?: null);

            $this->topicModel->updateTopic($topic);
        }
    }

    /**
     *
     * @access protected
     * @param \Map2u\ForumBundle\Entity\Board $board
     */
    protected function updateBoardStats(Board $board)
    {
        if ($board) {
            if ($board->getId()) {
                $stats = $this->topicModel->getTopicAndPostCountForBoardById($board->getId());

                // set the board topic / post count
                $board->setCachedTopicCount($stats['topicCount']);
                $board->setCachedPostCount($stats['postCount']);

                $lastTopic = $this->topicModel->findLastTopicForBoardByIdWithLastPost($board->getId());

                // set last_post for board
                if ($lastTopic) {
                    $board->setLastPost($lastTopic->getLastPost() ?: null);
                } else {
                    $board->setLastPost(null);
                }

                $this->boardModel->updateBoard($board);
            }
        }
    }

    /**
     *
     * @access protected
     * @param  \Map2u\ForumBundle\Entity\Topic      $topic
     * @return null|\Map2u\ForumBundle\Entity\Board
     */
    private function extractBoardFromTopic(Topic $topic)
    {
        if ($topic) {
            if ($topic->getId()) {
                return $topic->getBoard();
            }
        }

        return null;
    }

    /**
     *
     * @access protected
     * @param \Map2u\ForumBundle\Entity\Post $post
     */
    protected function updateRegistryStats(Post $post)
    {
        $user = $post->getCreatedBy();

        if ($user) {
            $registry = $this->registryModel->findOrCreateOneRegistryForUser($user);
            $postCount = $this->postModel->countPostsForUserById($user->getId());

            $registry->setCachedPostCount($postCount ? $postCount : 0);

            $this->registryModel->saveRegistry($registry);
        }
    }
}
