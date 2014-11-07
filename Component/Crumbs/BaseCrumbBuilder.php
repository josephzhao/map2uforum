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

namespace Map2u\ForumBundle\Component\Crumbs;

use Map2u\ForumBundle\Component\Crumbs\Factory\CrumbFactory;

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
class BaseCrumbBuilder
{
    /**
     *
     * @access protected
     * @var \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbFactory $crumbFactory
     */
    protected $crumbFactory;

    /**
     *
     * @access public
     * @param \Map2u\ForumBundle\Component\Crumbs\Factory\CrumbFactory $crumbs
     */
    public function __construct(CrumbFactory $crumbFactory)
    {
        $this->crumbFactory = $crumbFactory;
    }

    public function createCrumbTrail()
    {
        return $this->crumbFactory->createNewCrumbTrail();
    }
}
