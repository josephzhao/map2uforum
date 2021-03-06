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

namespace Map2u\ForumBundle\Component\Dispatcher\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;

use Map2u\ForumBundle\Entity\Board;

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
class AdminBoardEvent extends Event
{
    /**
     *
     * @access protected
     * @var \Symfony\Component\HttpFoundation\Request $request
     */
    protected $request;

    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Entity\Board $board
     */
    protected $board;

    /**
     *
     * @access public
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Map2u\ForumBundle\Entity\Board       $board
     */
    public function __construct(Request $request, Board $board = null)
    {
        $this->request = $request;
        $this->board = $board;
    }

    /**
     *
     * @access public
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Entity\Board
     */
    public function getBoard()
    {
        return $this->board;
    }
}
