<?php

namespace Main\MainBundle\Controller;

use Main\MainBundle\Entity\Promoted;
use Main\MainBundle\Entity\Promoted_Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Main\MainBundle\Entity\Contact;
use Symfony\Component\HttpFoundation\JsonResponse;
use Main\MainBundle\Form\ContactType;
use Symfony\Component\Validator\Constraints\DateTime;

class ServeurController extends Controller
{
    public function ServeursAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $serveurs = $em->getRepository('MainBundle:Serveur')->findAll();
        return $this->render('MainBundle:Serveur:layout\serveurs.html.twig',array(
            'serveurs'=>$serveurs,
        ));
    }
}
