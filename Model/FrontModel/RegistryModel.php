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

use Symfony\Component\Security\Core\User\UserInterface;
use Map2u\ForumBundle\Model\FrontModel\BaseModel;
use Map2u\ForumBundle\Model\FrontModel\ModelInterface;
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
class RegistryModel extends BaseModel implements ModelInterface
{
    /**
     *
     * @access public
     * @param  \Symfony\Component\Security\Core\User\UserInterface $user
     * @return \Map2u\ForumBundle\Entity\Registry
     */
    public function findOrCreateOneRegistryForUser(UserInterface $user)
    {
        $registry = $this->findOneRegistryForUserById($user->getId());

        if (! $registry) {
            $registry = $this->createRegistry();
            $registry->setOwnedBy($user);
            $this->saveRegistry($registry);
        }

        return $registry;
    }

    /**
     *
     * @access public
     * @param  int                                    $userId
     * @return \Map2u\ForumBundle\Entity\Registry
     */
    public function findOneRegistryForUserById($userId)
    {
        return $this->getRepository()->findOneRegistryForUserById($userId);
    }

    /**
     *
     * @access public
     * @return \Map2u\ForumBundle\Entity\Registry
     */
    public function createRegistry()
    {
        return $this->getManager()->createRegistry();
    }

    /**
     *
     * @access public
     * @param  \Map2u\ForumBundle\Entity\Registry                $registryModel
     * @return \Map2u\ForumBundle\Model\FrontModel\RegistryModel
     */
    public function saveRegistry(Registry $registry)
    {
        $this->getManager()->saveRegistry($registry);

        return $this;
    }
}
