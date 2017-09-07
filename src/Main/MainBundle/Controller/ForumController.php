<?php

namespace Main\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Main\MainBundle\Form\SearchType;

class ForumController extends Controller
{
    public function ForumAction()
    {
        return $this->render('MainBundle:Forum:layout\forum.html.twig');
    }
}
