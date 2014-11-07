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
use Map2u\ForumBundle\Entity\Forum;
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
class CategoryCreateFormHandler extends BaseFormHandler
{
    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Form\Type\Admin\Category\CategoryCreateFormType $categoryCreateFormType
     */
    protected $categoryCreateFormType;

    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Model\FrontModel\CategoryModel $categoryModel
     */
    protected $categoryModel;

    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Entity\Forum $defaultForum
     */
    protected $defaultForum;

    /**
     *
     * @access public
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface            $dispatcher
     * @param \Symfony\Component\Form\FormFactory                                    $factory
     * @param \Map2u\ForumBundle\Form\Type\Admin\Category\CategoryCreateFormType $categoryCreateFormType
     * @param \Map2u\ForumBundle\Model\FrontModel\CategoryModel                  $categoryModel
     */
    public function __construct(EventDispatcherInterface $dispatcher, FormFactory $factory, $categoryCreateFormType, ModelInterface $categoryModel)
    {
        $this->dispatcher = $dispatcher;
        $this->factory = $factory;
        $this->categoryCreateFormType = $categoryCreateFormType;
        $this->categoryModel = $categoryModel;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Forum                                          $forum
     * @return \Map2u\ForumBundle\Form\Handler\Admin\Category\CategoryCreateFormHandler
     */
    public function setDefaultForum(Forum $forum)
    {
        $this->defaultForum = $forum;

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
            $category = $this->categoryModel->createCategory();

            $options = array(
                'default_forum' => $this->defaultForum
            );

            $this->dispatcher->dispatch(ForumEvents::ADMIN_CATEGORY_CREATE_INITIALISE, new AdminCategoryEvent($this->request, $category));

            $this->form = $this->factory->create($this->categoryCreateFormType, $category, $options);
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
        $this->dispatcher->dispatch(ForumEvents::ADMIN_CATEGORY_CREATE_SUCCESS, new AdminCategoryEvent($this->request, $category));

        $this->categoryModel->saveCategory($category);

        $this->dispatcher->dispatch(ForumEvents::ADMIN_CATEGORY_CREATE_COMPLETE, new AdminCategoryEvent($this->request, $category));
    }
}
