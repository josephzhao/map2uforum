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

use Doctrine\Common\Collections\ArrayCollection;
use Map2u\ForumBundle\Model\FrontModel\BaseModel;
use Map2u\ForumBundle\Model\FrontModel\ModelInterface;
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
class ForumModel extends BaseModel implements ModelInterface
{
    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Entity\Forum
     */
    public function createForum()
    {
        return $this->getManager()->createForum();
    }

    /**
     *
     * @access public
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findAllForums()
    {
        return $this->getRepository()->findAllForums();
    }

    /**
     *
     * @access public
     * @param  string                              $forumName
     * @return \Map2u\ForumBundle\Entity\Forum
     */
    public function findOneForumById($forumId)
    {
        return $this->getRepository()->findOneForumById($forumId);
    }

    /**
     *
     * @access public
     * @param  string                              $forumName
     * @return \Map2u\ForumBundle\Entity\Forum
     */
    public function findOneForumByName($forumName)
    {
        return $this->getRepository()->findOneForumByName($forumName);
    }

    /**
     *
     * @access public
     * @param \Map2u\ForumBundle\Entity\Forum $forum
     */
    public function saveForum(Forum $forum)
    {
        return $this->getManager()->saveForum($forum);
    }

    /**
     *
     * @access public
     * @param \Map2u\ForumBundle\Entity\Forum $forum
     */
    public function updateForum(Forum $forum)
    {
        return $this->getManager()->updateForum($forum);
    }

    /**
     *
     * @access public
     * @param \Map2u\ForumBundle\Entity\Forum $forum
     */
    public function deleteForum(Forum $forum)
    {
        return $this->getManager()->deleteForum($forum);
    }

    /**
     *
     * @access public
     * @param \Doctrine\Common\Collections\ArrayCollection $categories
     * @param \Map2u\ForumBundle\Entity\Forum          $forum
     */
    public function reassignCategoriesToForum(ArrayCollection $categories, Forum $forum = null)
    {
        return $this->getManager()->reassignCategoriesToForum($categories, $forum);
    }
}
