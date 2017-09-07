<?php

namespace User\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use User\UserBundle\Entity\Membres;
use User\UserBundle\Entity\Team;
use User\UserBundle\Form\TeamType;
use Symfony\Component\HttpFoundation\JsonResponse;

class EquipeController extends Controller
{
    public function EquipeAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $role_admin = array();
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('UserBundle:User')->findAll();
        $key = 0;
        foreach ($users as $user)
        {
            foreach($user->getRoles() as $role)
            {
                if($role == 'ROLE_ADMIN')
                {
                    $role_admin[$key] = $user;
                    $key += 1 ;
                }
            }
        }
        $default_user = $role_admin[0];
        return $this->render('UserBundle:Default:layout\equipe.html.twig',array(
            'role_admin'=>$role_admin,
            'default_user'=>$default_user,
        ));
    }

    public function Creation_TeamAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($user == 'anon.')
        {
            return $this->redirectToRoute('fos_user_security_login');
        }
        $em = $this->getDoctrine()->getManager();
        $team = new Team();
        $user->addTeam($team);
        $chef = new Membres();
        $chef->setUser($user);
        $chef->setDroit('Administrateur');
        $chef->setRole('Chef');
        $chef->setDate(new \DateTime('now'));
        $form = $this->createForm(new TeamType(),$team);
//        $articles = $em->getRepository('MainBundle:Articles')->findAll();
        $form->handleRequest($request);
        if($form->isValid())
        {
            $team->setDate(new \DateTime('now'));
            $chef->setTeam($team);
            $em->persist($team);
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('annuaire');
        }
        return $this->render('UserBundle:Annuaire:layout\create_team.html.twig',array(
            'form'=>$form->createView()
        ));
    }

    public function Description_EquipeAction()
    {
        $request = $this->container->get('request');
        $id = $request->query->get('id');
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('UserBundle:User')->findOneById($id);

        $content = $this->RenderView('UserBundle:Default:layout\description_equipe.html.twig', array(
            'user'=>$user,
        ));
        $response = new JsonResponse();
        $response->setData(array('classifiedList' => $content));
        return $response;
    }

    public function Type_EquipeAction()
    {
        $request = $this->container->get('request');
        $role = $request->query->get('text');
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('UserBundle:User')->findAll();
        $key = 0;
        foreach ($users as $user)
        {
            foreach($user->getRoles() as $roles)
            {
                if($roles == $role)
                {
                    $role_admin[$key] = $user;
                    $key += 1 ;
                }
            }
        }

        $content = $this->RenderView('UserBundle:Default:layout\type_equipe.html.twig', array(
            'role_admin'=>$role_admin,
        ));
        $response = new JsonResponse();
        $response->setData(array('classifiedList' => $content));
        return $response;
    }
}
