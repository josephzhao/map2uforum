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
class CategoryModel extends BaseModel implements ModelInterface
{
    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Entity\Category
     */
    public function createCategory()
    {
        return $this->getManager()->createCategory();
    }

    /**
     *
     * @access public
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findAllCategories()
    {
        return $this->getRepository()->findAllCategories();
    }

    /**
     *
     * @access public
     * @param  int                                          $forumId
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findAllCategoriesForForumById($forumId)
    {
        return $this->getRepository()->findAllCategoriesForForumById($forumId);
    }

    /**
     *
     * @access public
     * @param  string                                       $forumName
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findAllCategoriesWithBoardsForForumByName($forumName)
    {
        return $this->getRepository()->findAllCategoriesWithBoardsForForumByName($forumName);
    }

    /**
     *
     * @access public
     * @param  int                                    $categoryId
     * @return \Map2u\ForumBundle\Entity\Category
     */
    public function findOneCategoryById($categoryId)
    {
        return $this->getRepository()->findOneCategoryById($categoryId);
    }

    /**
     *
     * @access public
     * @param  int                                    $categoryId
     * @return \Map2u\ForumBundle\Entity\Category
     */
    public function findOneCategoryByIdWithBoards($categoryId)
    {
        return $this->getRepository()->findOneCategoryByIdWithBoards($categoryId);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Category                          $category
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function saveCategory(Category $category)
    {
        return $this->getManager()->saveCategory($category);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Category                          $category
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function updateCategory(Category $category)
    {
        return $this->getManager()->updateCategory($category);
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Category                          $category
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function deleteCategory(Category $category)
    {
        return $this->getManager()->deleteCategory($category);
    }

    /**
     *
     * @access public
     * @param  \Doctrine\Common\Collections\ArrayCollection                    $boards
     * @param  \Map2u\ForumBundle\Entity\Category                          $category
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function reassignBoardsToCategory(ArrayCollection $boards, Category $category = null)
    {
        return $this->getManager()->reassignBoardsToCategory($boards, $category);
    }

    /**
     *
     * @access public
     * @param  Array                                                           $categories
     * @param  \Map2u\ForumBundle\Entity\Category                          $categoryShift
     * @param  int                                                             $direction
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function reorderCategories($categories, Category $categoryShift, $direction)
    {
        return $this->getManager()->reorderCategories($categories, $categoryShift, $direction);
    }
}
