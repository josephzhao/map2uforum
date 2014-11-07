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
class PostModel extends BaseModel implements ModelInterface
{
    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Entity\Post
     */
    public function createPost()
    {
        return $this->getManager()->createPost();
    }

    /**
     *
     * @access public
     * @param  int                                                      $topicId
     * @param  int                                                      $page
     * @param  int                                                      $itemsPerPage
     * @param  bool                                                     $canViewDeletedTopics
     * @return \Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination
     */
    public function findAllPostsPaginatedByTopicId($topicId, $page, $itemsPerPage = 25, $canViewDeletedTopics = false)
    {
        return $this->getRepository()->findAllPostsPaginatedByTopicId($topicId, $page, $itemsPerPage, $canViewDeletedTopics);
    }

    /**
     *
     * @access public
     * @param  int                                $postId
     * @param  bool                               $canViewDeletedTopics
     * @return \Map2u\ForumBundle\Entity\Post
     */
    public function findOnePostByIdWithTopicAndBoard($postId, $canViewDeletedTopics = false)
    {
        return $this->getRepository()->findOnePostByIdWithTopicAndBoard($postId, $canViewDeletedTopics);
    }

    /**
     *
     * @access public
     * @param  int                                $topicId
     * @return \Map2u\ForumBundle\Entity\Post
     */
    public function getFirstPostForTopicById($topicId)
    {
        return $this->getRepository()->getFirstPostForTopicById($topicId);
    }

    /**
     *
     * @access public
     * @param  int                                $topicId
     * @return \Map2u\ForumBundle\Entity\Post
     */
    public function getLastPostForTopicById($topicId)
    {
        return $this->getRepository()->getLastPostForTopicById($topicId);
    }

    /**
     *
     * @access public
     * @param  int   $topicId
     * @return Array
     */
    public function countPostsForTopicById($topicId)
    {
        return $this->getRepository()->countPostsForTopicById($topicId);
    }

    /**
     *
     * @access public
     * @param  int   $topicId
     * @return Array
     */
    public function countPostsForUserById($userId)
    {
        return $this->getRepository()->countPostsForUserById($userId);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Post                              $post
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function savePost(Post $post)
    {
        return $this->getManager()->savePost($post);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Post                              $post
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function updatePost(Post $post)
    {
        return $this->getManager()->updatePost($post);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Post                              $post
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function lock(Post $post)
    {
        return $this->getManager()->lock($post);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Post                              $post
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function restore(Post $post)
    {
        return $this->getManager()->restore($post);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Post                              $post
     * @param  \Symfony\Component\Security\Core\User\UserInterface             $user
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function softDelete(Post $post, UserInterface $user)
    {
        return $this->getManager()->softDelete($post, $user);
    }
}
