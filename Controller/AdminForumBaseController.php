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

use Map2u\ForumBundle\Entity\Forum;

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
class AdminForumBaseController extends BaseController
{
    /**
     *
     * @access protected
     * @return \Map2u\ForumBundle\Form\Handler\ForumCreateFormHandler
     */
    protected function getFormHandlerToCreateForum()
    {
        $formHandler = $this->container->get('map2u_forum.form.handler.forum_create');

        $formHandler->setRequest($this->getRequest());

        return $formHandler;
    }

    /**
     *
     * @access protected
     * @return \Map2u\ForumBundle\Form\Handler\ForumUpdateFormHandler
     */
    protected function getFormHandlerToUpdateForum(Forum $forum)
    {
        $formHandler = $this->container->get('map2u_forum.form.handler.forum_update');

        $formHandler->setRequest($this->getRequest());

        $formHandler->setForum($forum);

        return $formHandler;
    }

    /**
     *
     * @access protected
     * @return \Map2u\ForumBundle\Form\Handler\ForumDeleteFormHandler
     */
    protected function getFormHandlerToDeleteForum(Forum $forum)
    {
        $formHandler = $this->container->get('map2u_forum.form.handler.forum_delete');

        $formHandler->setRequest($this->getRequest());

        $formHandler->setForum($forum);

        return $formHandler;
    }
}
