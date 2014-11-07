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

namespace Map2u\ForumBundle\Form\Handler\Admin\Forum;

use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\EventDispatcher\EventDispatcherInterface ;

use Doctrine\Common\Collections\ArrayCollection;

use Map2u\ForumBundle\Component\Dispatcher\ForumEvents;
use Map2u\ForumBundle\Component\Dispatcher\Event\AdminForumEvent;
use Map2u\ForumBundle\Form\Handler\BaseFormHandler;
use Map2u\ForumBundle\Model\FrontModel\ModelInterface;
use Map2u\ForumBundle\Entity\Forum;

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
class ForumDeleteFormHandler extends BaseFormHandler
{
    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Form\Type\Admin\Forum\ForumDeleteFormType $forumDeleteFormType
     */
    protected $forumDeleteFormType;

    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Model\FrontModel\ForumModel $forumModel
     */
    protected $forumModel;

    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Entity\Forum $forum
     */
    protected $forum;

    /**
     *
     * @access public
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface      $dispatcher
     * @param \Symfony\Component\Form\FormFactory                              $factory
     * @param \Map2u\ForumBundle\Form\Type\Admin\Forum\ForumDeleteFormType $forumDeleteFormType
     * @param \Map2u\ForumBundle\Model\FrontModel\ForumModel               $forumModel
     */
    public function __construct(EventDispatcherInterface $dispatcher, FormFactory $factory, $forumDeleteFormType, ModelInterface $forumModel)
    {
        $this->dispatcher = $dispatcher;
        $this->factory = $factory;
        $this->forumDeleteFormType = $forumDeleteFormType;
        $this->forumModel = $forumModel;
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Forum                                    $forum
     * @return \Map2u\ForumBundle\Form\Handler\Admin\Forum\ForumDeleteFormHandler
     */
    public function setForum(Forum $forum)
    {
        $this->forum = $forum;

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
            if (!is_object($this->forum) && !$this->forum instanceof Forum) {
                throw new \Exception('Forum object must be specified to delete.');
            }

            $this->dispatcher->dispatch(ForumEvents::ADMIN_FORUM_DELETE_INITIALISE, new AdminForumEvent($this->request, $this->forum));

            $this->form = $this->factory->create($this->forumDeleteFormType, $this->forum);
        }

        return $this->form;
    }

    /**
     *
     * @access protected
     * @param \Map2u\ForumBundle\Entity\Forum $forum
     */
    protected function onSuccess(Forum $forum)
    {
        $this->dispatcher->dispatch(ForumEvents::ADMIN_FORUM_DELETE_SUCCESS, new AdminForumEvent($this->request, $forum));

        if (! $this->form->get('confirm_subordinates')->getData()) {
            $categories = new ArrayCollection($forum->getCategories()->toArray());

            $this->forumModel->reassignCategoriesToForum($categories, null)->flush();
        }

        $this->forumModel->deleteForum($forum);

        $this->dispatcher->dispatch(ForumEvents::ADMIN_FORUM_DELETE_COMPLETE, new AdminForumEvent($this->request, $forum));
    }
}
