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

namespace Map2u\ForumBundle\Model\Component\Manager;

use Map2u\ForumBundle\Model\Component\Manager\ManagerInterface;
use Map2u\ForumBundle\Model\Component\Manager\BaseManager;
use Map2u\ForumBundle\Entity\Registry;

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
class RegistryManager extends BaseManager implements ManagerInterface
{
    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Entity\Registry
     */
    public function createRegistry()
    {
        return $this->gateway->createRegistry();
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Registry                         $registry
     * @return \Map2u\ForumBundle\Model\Component\Manager\RegistryManager
     */
    public function saveRegistry(Registry $registry)
    {
        $this->gateway->saveRegistry($registry);

        return $this;
    }
}
