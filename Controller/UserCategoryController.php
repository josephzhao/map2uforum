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

namespace Map2u\ForumBundle\Controller;

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
class UserCategoryController extends BaseController
{
    /**
     *
     * Has 2 modes, when forum name is specified, categories for that forum are listed.
     * But, when forumName is ommitted all unassigned categories are listed.
     *
     * Optional Defaults:
     * default = unassigned categories only (will not include categories assigned to a forum, acts as default).
     *
     * @access public
     * @param  string         $forumName
     * @return RenderResponse
     */
    public function indexAction($forumName)
    {

        if ($forumName != 'default') {
            $this->isFound($forum = $this->getForumModel()->findOneForumByName($forumName));
            $this->isAuthorised($this->getAuthorizer()->canShowForum($forum));
            echo "234<br>";
            if($forum==null) {
               
                $forum = $this->getForumModel()->findOneForumByName($forumName);
            }
        } else {
            $forum = null;
        
            $this->isAuthorised($this->getAuthorizer()->canShowForumUnassigned());
        }

        $categories = $this->getCategoryModel()->findAllCategoriesWithBoardsForForumByName($forumName);

        return $this->renderResponse('Map2uForumBundle:User:Category/index.html.', array(
            'crumbs' => $this->getCrumbs()->addUserCategoryIndex($forum),
            'forum' => $forum,
            'forumName' => $forumName,
            'categories' => $categories,
            'topics_per_page' => $this->container->getParameter('ccdn_forum_forum.board.user.show.topics_per_page'),
        ));
    }

    /**
     *
     * @access public
     * @param  string         $forumName
     * @param  int            $categoryId
     * @return RenderResponse
     */
    public function showAction($forumName, $categoryId)
    {
        $this->isFound($forum = $this->getForumModel()->findOneForumByName($forumName));
        $this->isFound($category = $this->getCategoryModel()->findOneCategoryByIdWithBoards($categoryId));
        $this->isAuthorised($this->getAuthorizer()->canShowCategory($category, $forum));

        return $this->renderResponse('Map2uForumBundle:User:Category/show.html.', array(
            'crumbs' => $this->getCrumbs()->addUserCategoryShow($forum, $category),
            'forum' => $forum,
            'forumName' => $forumName,
            'category' => $category,
            'categories' => array($category),
            'topics_per_page' => $this->container->getParameter('ccdn_forum_forum.board.user.show.topics_per_page'),
        ));
    }
}
