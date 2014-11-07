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

namespace Map2u\ForumBundle\Component\Helper;

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
class PaginationConfigHelper
{
    /**
     *
     * @var int $topicsPerPageOnSubscriptions
     */
    protected $topicsPerPageOnSubscriptions;

    /**
     *
     * @var int $topicsPerPageOnBoards
     */
    protected $topicsPerPageOnBoards;

    /**
     *
     * @var int $postsPerPageOnTopics
     */
    protected $postsPerPageOnTopics;

    /**
     *
     * @access public
     * @param int $topicsPerPageOnSubscriptions
     * @param int $topicsPerPageOnBoards
     * @param int $postsPerPageOnTopics
     */
    public function __construct($topicsPerPageOnSubscriptions, $topicsPerPageOnBoards, $postsPerPageOnTopics)
    {
        $this->topicsPerPageOnSubscriptions = $topicsPerPageOnSubscriptions;
        $this->topicsPerPageOnBoards        = $topicsPerPageOnBoards;
        $this->postsPerPageOnTopics         = $postsPerPageOnTopics;
    }

    /**
     *
     * @access public
     * @return int
     */
    public function getTopicsPerPageOnSubscriptions()
    {
        return $this->topicsPerPageOnSubscriptions;
    }

    /**
     *
     * @access public
     * @return int
     */
    public function getTopicsPerPageOnBoards()
    {
        return $this->topicsPerPageOnBoards;
    }

    /**
     *
     * @access public
     * @return int
     */
    public function getPostsPerPageOnTopics()
    {
        return $this->postsPerPageOnTopics;
    }
}
