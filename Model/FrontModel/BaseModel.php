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

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Map2u\ForumBundle\Model\Component\Manager\ManagerInterface;
use Map2u\ForumBundle\Model\Component\Repository\RepositoryInterface;

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
 * @abstract
 */
abstract class BaseModel
{
    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Model\Component\Repository\RepositoryInterface
     */
    protected $repository;

    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    protected $manager;

    /**
     *
     * @access protected
     * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface $dispatcher
     */
    protected $dispatcher;

    /**
     *
     * @access public
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface           $dispatcher
     * @param \Map2u\ForumBundle\Model\Component\Repository\RepositoryInterface $repository
     * @param \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface       $manager
     */
    public function __construct(EventDispatcherInterface $dispatcher, RepositoryInterface $repository, ManagerInterface $manager)
    {
        $this->dispatcher = $dispatcher;

        $repository->setModel($this);
        $this->repository = $repository;

        $manager->setModel($this);
        $this->manager = $manager;
    }

    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Model\Component\Repository\RepositoryInterface
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Model\Component\Manager\ManagerInterface
     */
    public function getManager()
    {
        return $this->manager;
    }
}
