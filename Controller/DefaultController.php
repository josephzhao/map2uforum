<?php

namespace Map2u\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('Map2uForumBundle:Default:index.html.twig', array('name' => $name));
    }
}
