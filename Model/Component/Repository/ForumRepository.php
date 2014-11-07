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

namespace Map2u\ForumBundle\Model\Component\Repository;

use Map2u\ForumBundle\Model\Component\Repository\Repository;
use Map2u\ForumBundle\Model\Component\Repository\RepositoryInterface;

/**
 * ForumRepository
 *
 * @category Map2u
 * @package  ForumBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.0
 * @link     https://github.com/codeconsortium/Map2uForumBundle
 */
class ForumRepository extends BaseRepository implements RepositoryInterface
{
    /**
     *
     * @access public
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findAllForums()
    {
        $qb = $this->createSelectQuery(array('f'));

        return $this->gateway->findForums($qb);
    }

    /**
     *
     * @access public
     * @param  int                                 $forumId
     * @return \Map2u\ForumBundle\Entity\Forum
     */
    public function findOneForumById($forumId)
    {
        $params = array(':forumId' => $forumId);

        $qb = $this->createSelectQuery(array('f'));

        $qb
            ->where('f.id = :forumId');
        ;

        return $this->gateway->findForum($qb, $params);
    }

    /**
     *
     * @access public
     * @param  string                              $forumName
     * @return \Map2u\ForumBundle\Entity\Forum
     */
    public function findOneForumByName($forumName)
    {
        $params = array(':forumName' => $forumName);

        $qb = $this->createSelectQuery(array('f'));

        $qb
            ->where('upper(f.name) = upper(:forumName)');
        ;

        return $this->gateway->findForum($qb, $params);
    }
}
