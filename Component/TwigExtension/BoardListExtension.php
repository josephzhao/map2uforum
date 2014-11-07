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

namespace Map2u\ForumBundle\Component\TwigExtension;

use Map2u\ForumBundle\Model\FrontModel\ModelInterface;

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
class BoardListExtension extends \Twig_Extension
{
    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Model\FrontModel\ModelInterface $categoryModel
     */
    protected $categoryModel;

    /**
     *
     * @access public
     * @param \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface $categoryManager
     */
    public function __construct(ModelInterface $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    /**
     *
     * @access public
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'board_list' => new \Twig_Function_Method($this, 'boardList'),
        );
    }

    /**
     * Gets all boards available with their categories.
     *
     * @access public
     * @return array
     */
    public function boardList($forumName)
    {
        return $this->categoryModel->findAllCategoriesWithBoardsForForumByName($forumName);
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return 'boardList';
    }
}
