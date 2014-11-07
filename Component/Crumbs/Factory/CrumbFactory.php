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

namespace Map2u\ForumBundle\Component\Crumbs\Factory;

use Symfony\Bundle\FrameworkBundle\Translation\Translator;
use Symfony\Component\Routing\RouterInterface;

use Map2u\ForumBundle\Component\Crumbs\Factory\CrumbTrail;

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
class CrumbFactory
{
    /**
     *
     * @var \Symfony\Bundle\FrameworkBundle\Translation\Translator $translator
     */
    private $translator;

    /**
     *
     * @var \Symfony\Component\Routing\RouterInterface $router
     */
    private $router;

    /**
     *
     * @access public
     * @param \Symfony\Bundle\FrameworkBundle\Translation\Translator $translator
     * @param \Symfony\Component\Routing\RouterInterface             $router
     */
    public function __construct(Translator $translator, RouterInterface $router)
    {
        $this->translator = $translator;
        $this->router = $router;
    }

    public function createNewCrumbTrail()
    {
        return new CrumbTrail($this->translator, $this->router);
    }
}
