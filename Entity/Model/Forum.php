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

namespace Map2u\ForumBundle\Entity\Model;

use Doctrine\Common\Collections\ArrayCollection;

use Map2u\ForumBundle\Entity\Category as ConcreteCategory;

abstract class Forum
{
    /** @var $categories */
    protected $categories = null;

    /**
     *
     * @access public
     */
    public function __construct()
    {
        // your own logic
        $this->categories = new ArrayCollection();
    }

    /**
     *
     * Get categories
     *
     * @return Categories
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     *
     * Set categories
     *
     * @return Forum
     */
    public function setCategories(ArrayCollection $categories = null)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     *
     * Add category
     *
     * @param  Category $category
     * @return Forum
     */
    public function addCategory(ConcreteCategory $category)
    {
        $this->categories->add($category);

        return $this;
    }

    /**
     *
     * Remove Category
     *
     * @param  Category $category
     * @return Forum
     */
    public function removeCategory(ConcreteCategory $category)
    {
        $this->categories->removeElement($category);

        return $this;
    }
}
