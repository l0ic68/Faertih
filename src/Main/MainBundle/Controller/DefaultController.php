<?php

namespace Main\MainBundle\Controller;

use Main\MainBundle\Entity\Promoted;
use Main\MainBundle\Entity\Promoted_Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Main\MainBundle\Entity\Contact;
use Symfony\Component\HttpFoundation\JsonResponse;
use Main\MainBundle\Form\ContactType;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('MainBundle:Articles')->findAll();
        $promoted = $em->getRepository('MainBundle:Promoted')->findAll();
        $videos = $em->getRepository('MainBundle:Videos')->findAll();
        $user = $em->getRepository('UserBundle:User')->find($user);
        $all = array_merge($videos,$articles);

        foreach ($all as $key => $row) {
            $date[$key] = $row->getDatePublication();
        }
        array_multisort($date, SORT_DESC,$all);
        return $this->render('MainBundle:Default:layout\index.html.twig',array(
            'articles'=>$articles,
            'promoted'=>$promoted,
            'all'=>$all,
            'user'=>$user,
        ));
    }

    public function A_ProposAction()
    {
        $em = $this->getDoctrine()->getManager();
//        $articles = $em->getRepository('MainBundle:Articles')->findAll();
        return $this->render('MainBundle:Default:layout\a_propos.html.twig');
    }

    public function PromoteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $promote = new Promoted();
        $article = $em->getRepository('MainBundle:Articles')->find($id);
        $promoted = $em->getRepository('MainBundle:Promoted')->findOneByArticle($article);
//        $promoted3= new DateTime();
        $maxDate = $em->getRepository('MainBundle:Promoted')->myFindDate();

        foreach ($maxDate as $date1)
        {
            $date2 = $date1;
        }
        foreach ($date2 as $date3)
        {
            $dateFinal = $date3;
        }
        $dateF2 = date_create($dateFinal);
//        $dateF2 = date_create_from_format('Date',$dateFinal);
        $DateF = $em->getRepository('MainBundle:Promoted')->findOneByDate($dateF2);
//        var_dump($DateF);
//        $date = $em->getRepository('MainBundle:Promoted')->findOneByDate($testDate);
//        $promoted3 = $em->getRepository('MainBundle:Promoted')->find('all',array('conditions' => array('max(date)')));
        $promoted2 = $em->getRepository('MainBundle:Promoted')->findAll();
        $compte = 0;
        foreach( $promoted2 as $count)
        {
            $compte +=1;
        }
        if($compte >= 5)
        {
            var_dump('delete');
            $em->remove($DateF);
            $em->flush();
        }
        if ($promoted == null)
        {
        $promote->setDate(new \DateTime('now'));
        $promote->setArticle($article);
        $em->persist($promote);
        $em->flush();
        }
//        $articles = $em->getRepository('MainBundle:Articles')->findAll();
        return $this->render('MainBundle:Default:layout\a_propos.html.twig');
    }

    public function PromoteArticleAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $promote = new PromotedArticle();
        $article = $em->getRepository('MainBundle:Articles')->find($id);
        $promoted = $em->getRepository('MainBundle:PromotedArticle')->findAll();
//        $promoted3= new DateTime();
        $maxDate = $em->getRepository('MainBundle:PromotedArticle')->myFindDate();

        foreach ($maxDate as $date1)
        {
            $date2 = $date1;
        }
        foreach ($date2 as $date3)
        {
            $dateFinal = $date3;
        }
        $dateF2 = date_create($dateFinal);
//        $dateF2 = date_create_from_format('Date',$dateFinal);
        $DateF = $em->getRepository('MainBundle:PromotedArticle')->findOneByDate($dateF2);
//        var_dump($DateF);
//        $date = $em->getRepository('MainBundle:Promoted')->findOneByDate($testDate);
//        $promoted3 = $em->getRepository('MainBundle:Promoted')->find('all',array('conditions' => array('max(date)')));
        $promoted2 = $em->getRepository('MainBundle:PromotedArticle')->findAll();
        $compte = 0;
        foreach( $promoted2 as $count)
        {
            $compte +=1;
        }
        if($compte >= 5)
        {
            var_dump('delete');
            $em->remove($DateF);
            $em->flush();
        }
        if ($promoted == null)
        {
            $promote->setDate(new \DateTime('now'));
            $promote->setArticle($article);
            $em->persist($promote);
            $em->flush();
        }
//        $articles = $em->getRepository('MainBundle:Articles')->findAll();
        return $this->render('MainBundle:Default:layout\a_propos.html.twig');
    }

    public function DonAction()
    {
        $em = $this->getDoctrine()->getManager();
        $dons = $em->getRepository('MainBundle:Don')->findAll();
        $firstDon = $em->getRepository('MainBundle:Don')->myFindFirst();
        $maxDate = $em->getRepository('MainBundle:Promoted')->myFindDate();
        return $this->render('MainBundle:Default:layout\don.html.twig', array(
            'dons'=>$dons,
            'firstDon'=>$firstDon,
        ));
    }

    public function DonUserAction()
    {
        $request = $this->container->get('request');
        $text = $request->query->get('text');
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('UserBundle:User')->findOneByUsername($text);
        $don = $em->getRepository('MainBundle:Don')->findOneByUser($user);
//        var_dump($don);

        $content = $this->RenderView('MainBundle:Default:layout\donUser.html.twig', array(
            'don' => $don,
        ));

        $response = new JsonResponse();
        $response->setData(array('classifiedList' => $content));
        return $response;

    }

    public function contactAction()
    {
        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject('Contact Test')
                    ->setFrom('enquiries@symblog.co.uk')
                    ->setTo('tnpcclqp@gmail.com')
                    ->setBody($this->renderView('MainBundle:Contact:contactEmail.txt.twig', array('contact' => $contact)));
                $this->get('mailer')->send($message);

                $this->get('session')->getFlashBag()->Add('notice', 'Your contact enquiry was successfully sent. Thank you!');


                return $this->redirect($this->generateUrl('contact'));
            }
        }

        return $this->render('MainBundle:Contact:contact.html.twig',array('form'=>$form->createView()));
    }
}
