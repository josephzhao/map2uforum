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
class ModeratorPostBaseController extends BaseController
{
    /**
     *
     * @access protected
     * @param  \Map2u\ForumBundle\Entity\Post                                       $post
     * @return \Map2u\ForumBundle\Form\Handler\Moderator\Post\PostUnlockFormHandler
     */
    protected function getFormHandlerToUnlockPost(Post $post)
    {
        $formHandler = $this->container->get('map2u_forum.form.handler.post_unlock');

        $formHandler->setPost($post);
        $formHandler->setUser($this->getUser());
        $formHandler->setRequest($this->getRequest());

        return $formHandler;
    }
}
