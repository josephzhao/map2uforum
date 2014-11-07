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

namespace Map2u\ForumBundle\Form\Handler\Admin\Category;

use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\EventDispatcher\EventDispatcherInterface ;

use Map2u\ForumBundle\Component\Dispatcher\ForumEvents;
use Map2u\ForumBundle\Component\Dispatcher\Event\AdminCategoryEvent;
use Map2u\ForumBundle\Form\Handler\BaseFormHandler;
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
class CategoryUpdateFormHandler extends BaseFormHandler
{
    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Form\Type\Admin\Category\CategoryUpdateFormType $categoryUpdateFormType
     */
    protected $categoryUpdateFormType;

    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Model\FrontModel\CategoryModel $categoryModel
     */
    protected $categoryModel;

    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Entity\Category $category
     */
    protected $category;

    /**
     *
     * @access public
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface            $dispatcher
     * @param \Symfony\Component\Form\FormFactory                                    $factory
     * @param \Map2u\ForumBundle\Form\Type\Admin\Category\CategoryUpdateFormType $categoryUpdateFormType
     * @param \Map2u\ForumBundle\Model\FrontModel\CategoryModel                  $categoryModel
     */
    public function __construct(EventDispatcherInterface $dispatcher, FormFactory $factory, $categoryUpdateFormType, ModelInterface $categoryModel)
    {
        $this->dispatcher = $dispatcher;
        $this->factory = $factory;
        $this->categoryUpdateFormType = $categoryUpdateFormType;
        $this->categoryModel = $categoryModel;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Category                                       $category
     * @return \Map2u\ForumBundle\Form\Handler\Admin\Category\CategoryUpdateFormHandler
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     *
     * @access public
     * @return \Symfony\Component\Form\Form
     */
    public function getForm()
    {
        if (null == $this->form) {
            if (!is_object($this->category) && !$this->category instanceof Category) {
                throw new \Exception('Category object must be specified to edit.');
            }

            $this->dispatcher->dispatch(ForumEvents::ADMIN_CATEGORY_EDIT_INITIALISE, new AdminCategoryEvent($this->request, $this->category));

            $this->form = $this->factory->create($this->categoryUpdateFormType, $this->category);
        }

        return $this->form;
    }

    /**
     *
     * @access protected
     * @param \Map2u\ForumBundle\Entity\Category $category
     */
    protected function onSuccess(Category $category)
    {
        $this->dispatcher->dispatch(ForumEvents::ADMIN_CATEGORY_EDIT_SUCCESS, new AdminCategoryEvent($this->request, $category));

        $this->categoryModel->updateCategory($category);

        $this->dispatcher->dispatch(ForumEvents::ADMIN_CATEGORY_EDIT_COMPLETE, new AdminCategoryEvent($this->request, $category));
    }
}
