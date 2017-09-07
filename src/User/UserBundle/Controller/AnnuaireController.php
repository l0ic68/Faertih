<?php

namespace User\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AnnuaireController extends Controller
{
    public function AnnuaireAction()
    {
        $em = $this->getDoctrine()->getManager();
//        $articles = $em->getRepository('MainBundle:Articles')->findAll();
        return $this->render('UserBundle:Annuaire:layout\annuaire.html.twig');
    }

    public function AnnuaireMembreAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('UserBundle:User')->findAll();
        $team = $em->getRepository('UserBundle:Membres')->findByUser($users);
        return $this->render('UserBundle:Annuaire:layout\annuaire_membres.html.twig',array(
            'users'=>$users,
            'teams'=>$team,
        ));
    }

    public function AnnuaireEquipeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $equipes = $em->getRepository('UserBundle:Team')->findAll();
        return $this->render('UserBundle:Annuaire:layout\annuaire_equipe.html.twig',array(
            'equipes'=>$equipes,
        ));
    }

}
