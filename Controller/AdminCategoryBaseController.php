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

use Map2u\ForumBundle\Entity\Category;

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
class AdminCategoryBaseController extends BaseController
{
    /**
     *
     * @access protected
     * @return \Map2u\ForumBundle\Form\Handler\CategoryCreateFormHandler
     */
    protected function getFormHandlerToCreateCategory($forumFilter = null)
    {
        $formHandler = $this->container->get('map2u_forum.form.handler.category_create');

        $formHandler->setRequest($this->getRequest());

        if ($forumFilter) {
            $forum = $this->getForumModel()->findOneForumById($forumFilter);

            if ($forum) {
                $formHandler->setDefaultForum($forum);
            }
        }

        return $formHandler;
    }

    /**
     *
     * @access protected
     * @return \Map2u\ForumBundle\Form\Handler\CategoryUpdateFormHandler
     */
    protected function getFormHandlerToUpdateCategory(Category $category)
    {
        $formHandler = $this->container->get('map2u_forum.form.handler.category_update');

        $formHandler->setRequest($this->getRequest());

        $formHandler->setCategory($category);

        return $formHandler;
    }

    /**
     *
     * @access protected
     * @return \Map2u\ForumBundle\Form\Handler\CategoryDeleteFormHandler
     */
    protected function getFormHandlerToDeleteCategory(Category $category)
    {
        $formHandler = $this->container->get('map2u_forum.form.handler.category_delete');

        $formHandler->setRequest($this->getRequest());

        $formHandler->setCategory($category);

        return $formHandler;
    }

    /**
     *
     * @access protected
     * @param  \Map2u\ForumBundle\Entity\Category $category
     * @return array
     */
    protected function getFilterQueryStrings(Category $category)
    {
        $params = array();

        if ($category->getForum()) {
            $params['forum_filter'] = $category->getForum()->getId();
        }

        return $params;
    }
}
