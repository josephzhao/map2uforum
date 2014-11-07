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

namespace Map2u\ForumBundle\Component\Integrator;

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
class DashboardIntegrator
{
    /**
     *
     * @access public
     * @param  $builder
     */
    public function build($builder)
    {
        $builder
            ->addCategory('forum')
                ->setLabel('dashboard.categories.forum', array(), 'Map2uForumBundle')
                ->addPages()
                    ->addPage('community')
                        ->setLabel('dashboard.pages.community', array(), 'Map2uForumBundle')
                    ->end()
                    ->addPage('forum')
                        ->setLabel('dashboard.pages.forum', array(), 'Map2uForumBundle')
                    ->end()
                ->end()
                ->addLinks()
                    ->addLink('forum_index')
                        ->setRoute('ccdn_forum_user_category_index')
                        ->setIcon('/bundles/ccdncomponentcommon/images/icons/Black/32x32/32x32_discussion.png')
                        ->setLabel('dashboard.links.forum', array(), 'Map2uForumBundle')
                    ->end()
                    ->addLink('forum_subscriptions')
                        ->setAuthRole('ROLE_USER')
                        ->setRoute('ccdn_forum_user_subscription_index', array('forumName' => '~'))
                        ->setIcon('/bundles/ccdncomponentcommon/images/icons/Black/32x32/32x32_bookmark.png')
                        ->setLabel('dashboard.links.subscriptions', array(), 'Map2uForumBundle')
                    ->end()
                ->end()
            ->end()
        ;
    }
}
