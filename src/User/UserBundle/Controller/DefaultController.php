<?php

namespace User\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use User\UserBundle\Entity\Later;

class DefaultController extends Controller
{
    public function Mon_PlanningAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('UserBundle:User')->find($user);
        return $this->render('UserBundle:Default:layout\mon_planning.html.twig',array(
            'user'=>$user
        ));
    }

    public function Tri_Later_PlanningAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $request = $this->container->get('request');
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('UserBundle:User')->find($user);
        $value = $request->query->get('value');
        $view = $em->getRepository('UserBundle:Later')->findAll();
        if($value == 'Article')
        {
            foreach($user->getLater() as $key => $art)
            {
                if($art->getArticle() == null)
                {
                    unset($user->getLater()[$key]);
                }
            }
        }
        else if ($value == 'Video'){
            foreach($user->getLater() as $key => $art)
            {
                if($art->getVideo() == null)
                {
                    unset($user->getLater()[$key]);
                }
            }
        }


        $content = $this->RenderView('UserBundle:Default:layout\tri_mon_planning.html.twig', array(
            'user'=>$user
        ));
        $response = new JsonResponse();
        $response->setData(array('classifiedList' => $content));
        return $response;
    }

    public function Remove_Later_PlanningAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $request = $this->container->get('request');
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('UserBundle:User')->find($user);
        $id = $request->query->get('id');
        $separate = explode(' ',$id);
        $id = $separate[0];
        $type = $separate[1];
        if($type == 'article')
        {
            $article = $em->getRepository('MainBundle:Articles')->find($id);
            $later = $em->getRepository('UserBundle:Later')->findOneByArticle($article);
        }
        else if($type == 'video')
        {
            $video = $em->getRepository('MainBundle:Videos')->find($id);
            $later = $em->getRepository('UserBundle:Later')->findOneByVideo($video);
        }
        $user->RemoveLater($later);
        $em->persist($user);
        $em->remove($later);
        $em->flush();

        $content = $this->RenderView('UserBundle:Default:layout\tri_mon_planning.html.twig', array(
            'user'=>$user
        ));
        $response = new JsonResponse();
        $response->setData(array('classifiedList' => $content));
        return $response;
    }

    public function Regarder_Plus_TardAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $request = $this->container->get('request');
        $later = new Later();
        $id = $request->query->get('id');
        $type = $request->query->get('type');
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('UserBundle:User')->find($user);
        if($type == 'article')
        {
            $article = $em->getRepository('MainBundle:Articles')->find($id);
            $later->setArticle($article);
        }
        else{
            $video = $em->getRepository('MainBundle:Videos')->find($id);
            $later->setVideo($video);
        }
        $user->AddLater($later);
        $em->persist($user);
        $em->persist($later);
        $em->flush();
        $response = new JsonResponse();
        return $response;
    }
    public function AbonnementAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $request = $this->container->get('request');
        $id = $request->query->get('id');
        $id_art = $request->query->get('id_art');
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('UserBundle:User')->find($user);
        $article = $em->getRepository('MainBundle:Articles')->find($id_art);
        $auteur = $em->getRepository('UserBundle:User')->findOneById($id);
        $user->AddAbonnement($auteur);
        $em->persist($user);
        $em->flush();

        $user = $em->getRepository('UserBundle:User')->find($user);

        foreach ($user->getAbonnement() as $abonnement) {
            foreach ($article->getAuteur() as $auteur){
                $name = $auteur->getUsername();
                if ($abonnement == $auteur)
                {
                    $abonné[$name] = true;
                }
                else {
                    if(!isset($abonné[$name]) && $abonné[$name] =! true)
                    {
                        $abonné[$name] = false;
                    }
                }
            }
        }
        $content = $this->RenderView('UserBundle:Default:layout\abonnement.html.twig', array(
            'article' => $article,
            'abonnes' => $abonné,
        ));
        $response = new JsonResponse();
        $response->setData(array('classifiedList' => $content));
        return $response;
    }
}
