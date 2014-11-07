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
class BoardModel extends BaseModel implements ModelInterface
{
    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Entity\Board
     */
    public function createBoard()
    {
        return $this->getManager()->createBoard();
    }

    /**
     *
     * @access public
     * @return \Doctrine\Common\Collection\ArrayCollection
     */
    public function findAllBoards()
    {
        return $this->getRepository()->findAllBoards();
    }

    /**
     *
     * @access public
     * @param  int                                          $categoryId
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findAllBoardsForCategoryById($categoryId)
    {
        return $this->getRepository()->findAllBoardsForCategoryById($categoryId);
    }

    /**
     *
     * @access public
     * @param  int                                          $forumId
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findAllBoardsForForumById($forumId)
    {
        return $this->getRepository()->findAllBoardsForForumById($forumId);
    }

    /**
     *
     * @access public
     * @param  int                                 $boardId
     * @return \Map2u\ForumBundle\Entity\Board
     */
    public function findOneBoardById($boardId)
    {
        return $this->getRepository()->findOneBoardById($boardId);
    }

    /**
     *
     * @access public
     * @param  int                                 $boardId
     * @return \Map2u\ForumBundle\Entity\Board
     */
    public function findOneBoardByIdWithCategory($boardId)
    {
        return $this->getRepository()->findOneBoardByIdWithCategory($boardId);
    }

    /**
     *
     * @access public
     * @return Array
     */
    public function getBoardCount()
    {
        return $this->getRepository()->getBoardCount();
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Board                             $board
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function saveBoard(Board $board)
    {
        return $this->getManager()->saveBoard($board);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Board                             $board
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function updateBoard(Board $board)
    {
       return $this->getManager()->updateBoard($board);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Board                             $board
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function deleteBoard(Board $board)
    {
        return $this->getManager()->deleteBoard($board);
    }

    /**
     *
     * @access public
     * @param  \Doctrine\Common\Collections\ArrayCollection                    $topics
     * @param  \Map2u\ForumBundle\Entity\Board                             $board
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function reassignTopicsToBoard(ArrayCollection $topics, Board $board = null)
    {
        return $this->getManager()->reassignTopicsToBoard($topics, $board);
    }

    /**
     *
     * @access public
     * @param  Array                                                           $boards
     * @param  \Map2u\ForumBundle\Entity\Board                             $boardShift
     * @param  int                                                             $direction
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function reorderBoards($boards, Board $boardShift, $direction)
    {
        return $this->getManager()->reorderBoards($boards, $boardShift, $direction);
    }
}
