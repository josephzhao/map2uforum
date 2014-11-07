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
class CrumbTrail
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
     * @var array $crumbs;
     */
    private $crumbs;

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
        $this->crumbs = array();
    }

    /**
     *
     * @access protected
     * @param  string $message
     * @param  Array  $params
     * @param  string $bundle
     * @return string
     */
    protected function trans($message, $params = array(), $bundle = 'Map2uForumBundle')
    {
        return $this->translator->trans($message, $params, $bundle);
    }

    /**
     *
     * @access protected
     * @param  string $route
     * @param  Array  $params
     * @return string
     */
    protected function path($route, $params = array())
    {
        return $this->router->generate($route, $params);
    }

    public function getTrail()
    {
        return $this->crumbs;
    }

    public function count()
    {
        return count($this->crumbs);
    }

    public function add($label, $route, $icon = null)
    {
        if (is_array($label)) {
            if (! isset($label['label'])) {
                if (! isset($label['label'])) {
                    throw new \Exception('Label array key must be set when passing an array.');
                }
            }

            if (! isset($label['params'])) {
                $label['params'] = array();
            }

            if (! isset($label['bundle'])) {
                $label['bundle'] = 'Map2uForumBundle';
            }

            $labelTranslated = $this->trans($label['label'], $label['params'], $label['bundle']);
        } else {
            $labelTranslated = $this->trans($label, array());
        }

        if (is_array($route)) {
            if (! isset($route['route'])) {
                throw new \Exception('Route array key must be set when passing an array.');
            }

            if (! isset($route['params'])) {
                $route['params'] = array();
            }

            $path = $this->path($route['route'], $route['params']);
        } else {
            $path = $this->path($route, array());
        }

        $this->crumbs[] = array('label' => $labelTranslated, 'url' => $path, 'icon' => $icon);

        return $this;
    }
}
