<?php

namespace Main\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Main\MainBundle\Form\SearchType;

class EventController extends Controller
{
    public function eventAction()
    {
        return $this->render('MainBundle:Event:layout\event.html.twig');
    }
}
