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

namespace Map2u\ForumBundle\Form\Handler\Admin\Board;

use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\EventDispatcher\EventDispatcherInterface ;

use Map2u\ForumBundle\Component\Dispatcher\ForumEvents;
use Map2u\ForumBundle\Component\Dispatcher\Event\AdminBoardEvent;
use Map2u\ForumBundle\Form\Handler\BaseFormHandler;
use Map2u\ForumBundle\Model\FrontModel\ModelInterface;
use Map2u\ForumBundle\Entity\Category;
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
class BoardCreateFormHandler extends BaseFormHandler
{
    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Form\Type\Admin\Board\BoardCreateFormType $boardCreateFormType
     */
    protected $boardCreateFormType;

    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Model\FrontModel\BoardModel $boardModel
     */
    protected $boardModel;

    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Entity\Category $defaultCategory
     */
    protected $defaultCategory;

    /**
     *
     * @access public
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $dispatcher
     * @param \Symfony\Component\Form\FormFactory                         $factory
     * @param \Map2u\ForumBundle\Form\Type\Board\BoardCreateFormType  $boardCreateFormType
     * @param \Map2u\ForumBundle\Model\FrontModel\BoardModel          $boardModel
     */
    public function __construct(EventDispatcherInterface $dispatcher, FormFactory $factory, $boardCreateFormType, ModelInterface $boardModel)
    {
        $this->dispatcher = $dispatcher;
        $this->factory = $factory;
        $this->boardCreateFormType = $boardCreateFormType;
        $this->boardModel = $boardModel;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Forum                                          $forum
     * @return \Map2u\ForumBundle\Form\Handler\Admin\Category\CategoryCreateFormHandler
     */
    public function setDefaultCategory(Category $category)
    {
        $this->defaultCategory = $category;

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
            $board = $this->boardModel->createBoard();

            $this->dispatcher->dispatch(ForumEvents::ADMIN_BOARD_CREATE_INITIALISE, new AdminBoardEvent($this->request, $board));

            $options = array(
                'default_category' => $this->defaultCategory
            );

            $this->form = $this->factory->create($this->boardCreateFormType, $board, $options);
        }

        return $this->form;
    }

    /**
     *
     * @access protected
     * @param \Map2u\ForumBundle\Entity\Board $board
     */
    protected function onSuccess(Board $board)
    {
        $this->dispatcher->dispatch(ForumEvents::ADMIN_BOARD_CREATE_SUCCESS, new AdminBoardEvent($this->request, $board));

        $this->boardModel->saveBoard($board);

        $this->dispatcher->dispatch(ForumEvents::ADMIN_BOARD_CREATE_COMPLETE, new AdminBoardEvent($this->request, $board));
    }
}
