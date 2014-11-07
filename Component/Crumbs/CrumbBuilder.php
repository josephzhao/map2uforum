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

namespace Map2u\ForumBundle\Component\Crumbs;

use Map2u\ForumBundle\Entity\Forum;
use Map2u\ForumBundle\Entity\Category;
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
class CrumbBuilder extends BaseCrumbBuilder
{
    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminIndex()
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
        ;
    }

    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageForumsIndex()
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-forums.index', 'ccdn_forum_admin_forum_list')
        ;
    }

    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageForumsCreate()
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-forums.index', 'ccdn_forum_admin_forum_list')
            ->add('crumbs.admin.manage-forums.create', 'ccdn_forum_admin_forum_create')
        ;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Forum                        $forum
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageForumsEdit(Forum $forum)
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-forums.index', 'ccdn_forum_admin_forum_list')
            ->add(
                array(
                    'label' => 'crumbs.admin.manage-forums.edit',
                    'params' => array(
                        '%forum_name%' => $forum->getName()
                    )
                ),
                array(
                    'route' => 'ccdn_forum_admin_forum_edit',
                    'params' => array(
                        'forumId' => $forum->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Forum                        $forum
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageForumsDelete(Forum $forum)
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-forums.index', 'ccdn_forum_admin_forum_list')
            ->add(
                array(
                    'label' => 'crumbs.admin.manage-forums.delete',
                    'params' => array(
                        '%forum_name%' => $forum->getName()
                    )
                ),
                array(
                    'route' => 'ccdn_forum_admin_forum_delete',
                    'params' => array(
                        'forumId' => $forum->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageCategoriesIndex()
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-categories.index', 'ccdn_forum_admin_category_list')
        ;
    }

    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageCategoriesCreate()
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-categories.index', 'ccdn_forum_admin_category_list')
            ->add('crumbs.admin.manage-categories.create', 'ccdn_forum_admin_category_create')
        ;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Category                     $category
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageCategoriesEdit(Category $category)
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-categories.index', 'ccdn_forum_admin_category_list')
            ->add(
                array(
                    'label' => 'crumbs.admin.manage-categories.edit',
                    'params' => array(
                        '%category_name%' => $category->getName()
                    )
                ),
                array(
                    'route' => 'ccdn_forum_admin_category_edit',
                    'params' => array(
                        'categoryId' => $category->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Category                     $category
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageCategoriesDelete(Category $category)
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-categories.index', 'ccdn_forum_admin_category_list')
            ->add(
                array(
                    'label' => 'crumbs.admin.manage-categories.delete',
                    'params' => array(
                        '%category_name%' => $category->getName()
                    )
                ),
                array(
                    'route' => 'ccdn_forum_admin_category_delete',
                    'params' => array(
                        'categoryId' => $category->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageBoardsIndex()
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-boards.index', 'ccdn_forum_admin_board_list')
        ;
    }

    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageBoardsCreate()
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-boards.index', 'ccdn_forum_admin_board_list')
            ->add('crumbs.admin.manage-boards.create', 'ccdn_forum_admin_board_create')
        ;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Board                        $board
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageBoardsEdit(Board $board)
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-boards.index', 'ccdn_forum_admin_board_list')
            ->add(
                array(
                    'label' => 'crumbs.admin.manage-boards.edit',
                    'params' => array(
                        '%board_name%' => $board->getName()
                    )
                ),
                array(
                    'route' => 'ccdn_forum_admin_board_edit',
                    'params' => array(
                        'boardId' => $board->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Board                        $board
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addAdminManageBoardsDelete(Board $board)
    {
        return $this->createCrumbTrail()
            ->add('crumbs.admin.index', 'ccdn_forum_admin_index')
            ->add('crumbs.admin.manage-boards.index', 'ccdn_forum_admin_board_list')
            ->add(
                array(
                    'label' => 'crumbs.admin.manage-boards.delete',
                    'params' => array(
                        '%board_name%' => $board->getName()
                    )
                ),
                array(
                    'route' => 'ccdn_forum_admin_board_delete',
                    'params' => array(
                        'boardId' => $board->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Forum                        $forum
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addUserCategoryIndex(Forum $forum = null)
    {
        return $this->createCrumbTrail()
            ->add(
                $forum ?
                    $forum->getName() == 'default' ?  'Index' : $forum->getName() . ' Index'
                    :
                    'Index'
                ,
                array(
                    'route' => 'ccdn_forum_user_category_index',
                    'params' => array(
                        'forumName' => $forum ? $forum->getName() : 'default'
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Forum                        $forum
     * @param  \Map2u\ForumBundle\Entity\Category                     $category
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addUserCategoryShow(Forum $forum, Category $category)
    {
        return $this->addUserCategoryIndex($forum)
            ->add(
                $category->getName(),
                array(
                    'route' => 'ccdn_forum_user_category_show',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'categoryId' => $category->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Forum                        $forum
     * @param  \Map2u\ForumBundle\Entity\Board                        $board
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addUserBoardShow(Forum $forum, Board $board)
    {
        return $this->addUserCategoryShow($forum, $board->getCategory())
            ->add(
                $board->getName(),
                array(
                    'route' => 'ccdn_forum_user_board_show',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'boardId' => $board->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Forum                        $forum
     * @param  \Map2u\ForumBundle\Entity\Topic                        $topic
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addUserTopicShow(Forum $forum, Topic $topic)
    {
        return $this->addUserBoardShow($forum, $topic->getBoard())
            ->add(
                $topic->getTitle(),
                array(
                    'route' => 'ccdn_forum_user_topic_show',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'topicId' => $topic->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Forum                        $forum
     * @param  \Map2u\ForumBundle\Entity\Board                        $board
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addUserTopicCreate(Forum $forum, Board $board)
    {
        return $this->addUserBoardShow($forum, $board)
            ->add(
                array(
                    'label' => 'crumbs.user.topic.create',
                ),
                array(
                    'route' => 'ccdn_forum_user_topic_create',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'boardId' => $board->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Forum                        $forum
     * @param  \Map2u\ForumBundle\Entity\Topic                        $topic
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addUserTopicReply(Forum $forum, Topic $topic)
    {
        return $this->addUserTopicShow($forum, $topic)
            ->add(
                array(
                    'label' => 'crumbs.user.topic.reply',
                ),
                array(
                    'route' => 'ccdn_forum_user_topic_reply',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'topicId' => $topic->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Forum                        $forum
     * @param  \Map2u\ForumBundle\Entity\Post                         $post
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addUserPostShow(Forum $forum, Post $post)
    {
        return $this->addUserTopicShow($forum, $post->getTopic())
            ->add(
                '# ' . $post->getId(),
                array(
                    'route' => 'ccdn_forum_user_post_show',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'postId' => $post->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Forum                        $forum
     * @param  \Map2u\ForumBundle\Entity\Post                         $post
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addUserPostDelete(Forum $forum, Post $post)
    {
        return $this->addUserPostShow($forum, $post)
            ->add(
                array(
                    'label' => 'crumbs.user.post.delete',
                ),
                array(
                    'route' => 'ccdn_forum_user_post_delete',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'postId' => $post->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Forum                        $forum
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addUserSubscriptionIndex(Forum $forum)
    {
        return $this->addUserCategoryIndex($forum)
            ->add(
                array(
                    'label' => 'crumbs.user.subscription.index',
                ),
                array(
                    'route' => 'ccdn_forum_user_subscription_index',
                    'params' => array(
                        'forumName' => $forum->getName()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Forum                        $forum
     * @param  \Map2u\ForumBundle\Entity\Topic                        $topic
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addModeratorTopicDelete(Forum $forum, Topic $topic)
    {
        return $this->addUserTopicShow($forum, $topic)
            ->add(
                array(
                    'label' => 'crumbs.moderator.topic.delete',
                ),
                array(
                    'route' => 'ccdn_forum_moderator_topic_delete',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'topicId'   => $topic->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Forum                        $forum
     * @param  \Map2u\ForumBundle\Entity\Topic                        $topic
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addModeratorTopicChangeBoard(Forum $forum, Topic $topic)
    {
        return $this->addUserTopicShow($forum, $topic)
            ->add(
                array(
                    'label' => 'crumbs.moderator.topic.move',
                ),
                array(
                    'route' => 'ccdn_forum_moderator_topic_change_board',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'topicId'   => $topic->getId()
                    )
                )
            )
        ;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Forum                        $forum
     * @param  \Map2u\ForumBundle\Entity\Post                         $post
     * @return \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail
     */
    public function addModeratorPostUnlock(Forum $forum, Post $post)
    {
        return $this->addUserPostShow($forum, $post)
            ->add(
                array(
                    'label' => 'crumbs.moderator.post.unlock',
                ),
                array(
                    'route' => 'ccdn_forum_moderator_post_unlock',
                    'params' => array(
                        'forumName' => $forum->getName(),
                        'postId'   => $post->getId()
                    )
                )
            )
        ;
    }
}
