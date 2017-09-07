<?php

namespace User\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use User\UserBundle\Entity\Message;
use User\UserBundle\Form\Nouveau_MessageType;

class MessagerieController extends Controller
{
    public function Nouveau_MessageAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        if($user == 'anon.')
        {
            return $this->redirectToRoute('fos_user_security_login');
        }
        $message = new Message();
        $form = $this->createForm(new Nouveau_MessageType());
        if('POST' === $request->getMethod()) {

                $form->handleRequest($request);
            $username = $form["destinataire"]->getData();
            $objet = $form["objet"]->getData();
            $text = $form["message"]->getData();
//            var_dump($username);
                if ($form->isValid()) {
                    $destinataire = $em->getRepository('UserBundle:User')->findOneByUsername($username);
                    $message->setDestinataire($destinataire);
                    $message->setDate(new \DateTime('now'));
                    $message->setLu(false);
                    $message->setExpediteur($user);
                    $message->setObjet($objet);
                    $message->setMessage($text);
//                    var_dump($message);

                    // On l'enregistre notre objet $advert dans la base de données, par exemple
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($message);
                    $em->flush();
                    return $this->redirectToRoute('boite_reception');
            }
        }
        return $this->render('UserBundle:Messagerie:layout\nouveau_message.html.twig',array(
            'form' =>$form->createView()
        ));
    }
    public function Boite_ReceptionAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        if($user == 'anon.')
        {
            return $this->redirectToRoute('fos_user_security_login');
        }
        $messages = $em->getRepository('UserBundle:Message')->findByDestinataire($user);
        return $this->render('UserBundle:Messagerie:layout\boite_reception.html.twig',array(
           'messages'=>$messages
        ));
    }

    public function Message_ouvertAction($id)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $message = $em->getRepository('UserBundle:Message')->find($id);
        $destinataire = $message->getDestinataire();
        if($destinataire == $user)
        {
            $message->setLu(true);
            $em->persist($message);
            $em->flush();
            return $this->render('UserBundle:Messagerie:layout\message_ouvert.html.twig',array(
                'message'=>$message
            ));
        }
        else
        {
            return $this->redirectToRoute('index');
        }
    }
}
