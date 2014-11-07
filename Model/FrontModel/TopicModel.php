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
class TopicModel extends BaseModel implements ModelInterface
{
    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Entity\Topic
     */
    public function createTopic()
    {
        return $this->getManager()->createTopic();
    }

    /**
     *
     * @access public
     * @param  int                                                      $boardId
     * @param  int                                                      $page
     * @param  int                                                      $itemsPerPage
     * @param  bool                                                     $canViewDeletedTopics
     * @return \Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination
     */
    public function findAllTopicsPaginatedByBoardId($boardId, $page, $itemsPerPage = 25, $canViewDeletedTopics = false)
    {
        return $this->getRepository()->findAllTopicsPaginatedByBoardId($boardId, $page, $itemsPerPage, $canViewDeletedTopics);
    }

    /**
     *
     * @access public
     * @param  int                                                      $boardId
     * @param  bool                                                     $canViewDeletedTopics
     * @return \Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination
     */
    public function findAllTopicsStickiedByBoardId($boardId, $canViewDeletedTopics = false)
    {
        return $this->getRepository()->findAllTopicsStickiedByBoardId($boardId, $canViewDeletedTopics);
    }

    /**
     *
     * @access public
     * @param  int                                 $topicId
     * @param  bool                                $canViewDeletedTopics
     * @return \Map2u\ForumBundle\Entity\Topic
     */
    public function findOneTopicByIdWithBoardAndCategory($topicId, $canViewDeletedTopics = false)
    {
        return $this->getRepository()->findOneTopicByIdWithBoardAndCategory($topicId, $canViewDeletedTopics);
    }

    /**
     *
     * @access public
     * @param  int                                 $topicId
     * @param  bool                                $canViewDeletedTopics
     * @return \Map2u\ForumBundle\Entity\Topic
     */
    public function findOneTopicByIdWithPosts($topicId, $canViewDeletedTopics = false)
    {
        return $this->getRepository()->findOneTopicByIdWithPosts($topicId, $canViewDeletedTopics);
    }

    /**
     *
     * @access public
     * @param  int                                 $topicId
     * @return \Map2u\ForumBundle\Entity\Topic
     */
    public function findLastTopicForBoardByIdWithLastPost($boardId)
    {
        return $this->getRepository()->findLastTopicForBoardByIdWithLastPost($boardId);
    }

    /**
     *
     * @access public
     * @param  int   $boardId
     * @return Array
     */
    public function getTopicAndPostCountForBoardById($boardId)
    {
        return $this->getRepository()->getTopicAndPostCountForBoardById($boardId);
    }

    /**
     *
     * Post must have a set topic for topic to be set correctly.
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Post                              $post
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function saveTopic(Topic $topic)
    {
        return $this->getManager()->saveTopic($topic);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic                             $topic
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function updateTopic(Topic $topic)
    {
        return $this->getManager()->updateTopic($topic);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic                             $topic
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function incrementViewCounter(Topic $topic)
    {
        return $this->getManager()->incrementViewCounter($topic);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic                             $topic
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function restore(Topic $topic)
    {
        return $this->getManager()->restore($topic);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic                             $topic
     * @param  \Symfony\Component\Security\Core\User\UserInterface             $user
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function softDelete(Topic $topic, UserInterface $user)
    {
        return $this->getManager()->softDelete($topic, $user);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic                             $topic
     * @param  \Symfony\Component\Security\Core\User\UserInterface             $user
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function sticky(Topic $topic, UserInterface $user)
    {
        return $this->getManager()->sticky($topic, $user);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic                             $topic
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function unsticky(Topic $topic)
    {
        return $this->getManager()->unsticky($topic);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic                             $topic
     * @param  \Symfony\Component\Security\Core\User\UserInterface             $user
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function close(Topic $topic, UserInterface $user)
    {
        return $this->getManager()->close($topic, $user);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Topic                             $topic
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function reopen(Topic $topic)
    {
        return $this->getManager()->reopen($topic);
    }
}
