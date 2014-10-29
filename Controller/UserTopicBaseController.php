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
use Map2u\ForumBundle\Entity\Board;
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
class UserTopicBaseController extends BaseController
{
    /**
     *
     * @access protected
     * @param  \Map2u\ForumBundle\Entity\Forum                        $forum
     * @param  \Map2u\ForumBundle\Entity\Board                        $board
     * @return \Map2u\ForumBundle\Form\Handler\TopicCreateFormHandler
     */
    protected function getFormHandlerToCreateTopic(Forum $forum, Board $board)
    {
        $formHandler = $this->container->get('ccdn_forum_forum.form.handler.topic_create');

        $formHandler->setForum($forum);
        $formHandler->setBoard($board);
        $formHandler->setUser($this->getUser());
        $formHandler->setRequest($this->getRequest());

        return $formHandler;
    }

    /**
     *
     * @access protected
     * @param  \Map2u\ForumBundle\Entity\Topic                        $topic
     * @return \Map2u\ForumBundle\Form\Handler\TopicCreateFormHandler
     */
    protected function getFormHandlerToReplyToTopic(Topic $topic)
    {
        $formHandler = $this->container->get('ccdn_forum_forum.form.handler.post_create');

        $formHandler->setTopic($topic);
        $formHandler->setUser($this->getUser());
        $formHandler->setRequest($this->getRequest());

        return $formHandler;
    }
}
