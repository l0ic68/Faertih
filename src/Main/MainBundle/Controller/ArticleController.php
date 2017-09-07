<?php

namespace Main\MainBundle\Controller;

use Main\MainBundle\Entity\Articles;
use Main\MainBundle\Entity\Promoted;
use Main\MainBundle\Entity\Comments;
use Main\MainBundle\Entity\Tags;
use Main\MainBundle\Form\ArticlesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Main\MainBundle\Entity\Contact;
use Symfony\Component\HttpFoundation\JsonResponse;
use Main\MainBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class ArticleController extends Controller
{
    public function LectureArticleAction($id)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $noprevious =false;
        $nonext = false;
        $em = $this->getDoctrine()->getManager();
        $abonné = array();
        $article = $em->getRepository('MainBundle:Articles')->find($id);
        $articlePrev = $em->getRepository('MainBundle:Articles')->findPrevious($id);
        $articleNext = $em->getRepository('MainBundle:Articles')->findNext($id);
        if ($articlePrev == null)
        {
            $noprevious = true;
        }
        if ($articleNext == null)
        {
            $nonext = true;
        }
        $boucle = false;
        if ($user != "anon.") {
            $user = $em->getRepository('UserBundle:User')->find($user);
            foreach ($article->getAuteur() as $auteur) {
                $name = $auteur->getUsername();
                foreach ($user->getAbonnement() as $abonnement) {
                    $boucle = true;
                    if ($abonnement == $auteur) {
                        $abonné[$name] = true;
                    } else {
                        if (isset($abonné[$name]) && $abonné[$name] != true) {
                            $abonné[$name] = false;
                        }
                    }
                }
                if (!isset($abonné[$name])) {
                    $abonné[$name] = false;
                }
            }
        if ($boucle == false) {
            foreach ($article->getAuteur() as $auteur) {
                $name = $auteur->getUsername();
                $abonné[$name] = false;
            }
        }
    }

            return $this->render('MainBundle:Articles:layout\lecture_article.html.twig', array(
                'article' => $article,
                'articlePrev' => $articlePrev,
                'articleNext' => $articleNext,
                'abonnes' => $abonné,
                'noprevious' => $noprevious,
                'nonext' => $nonext,
            ));
    }

    public function ArticlesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $auteurs = array();
        $compte = 0;
        $articles = $em->getRepository('MainBundle:Articles')->findAll();
        $categories = $em->getRepository('MainBundle:Categories')->findByType('article');
        $formats = $em->getRepository('MainBundle:Format')->findByType('article');
        $promoteds = $em->getRepository('MainBundle:PromotedArticle')->findAll();
        $promoted_first = array_shift($promoteds);
        foreach ($articles as $article) {
//            var_dump($article->getAuteur());
            foreach ($article->getAuteur() as $auteur)
            {
                if(!in_array($auteur,$auteurs))
                {
                    $auteurs[$compte] = $auteur;
                    $compte +=1;
                }
            }
        }
        return $this->render('MainBundle:Articles:layout\articles.html.twig', array(
            'articles' => $articles,
            'auteurs' => $auteurs,
            'categories' => $categories,
            'formats' => $formats,
            'promoteds' => $promoteds,
            'promoted_first' => $promoted_first,

        ));
    }

    public function searchArticleAction()
    {
        $request = $this->container->get('request');
        $auteur = $request->query->get('auteur');
        $categorie = $request->query->get('categorie');
        $format = $request->query->get('format');
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('MainBundle:Articles')->findAll();
        if($auteur != 'auteur')
        {
            if($categorie != 'categorie')
            {
                if($format != 'format')
                {
                    foreach ($articles as $key =>$article)
                    {
                        $auteur_present = false;
                        if($article->getCategorie()->getNom() != $categorie)
                        {
                            unset($articles[$key]);
                        }
                        if($article->getFormat()->getNom() != $format)
                        {
                            unset($articles[$key]);
                        }
                        foreach($article->getAuteur() as $auteur_trie)
                        {
                            if($auteur_trie->getUsername() == $auteur)
                            {
                                $auteur_present = true;
                            }
                        }
                        if($auteur_present != true)
                        {
                            unset($articles[$key]);
                        }
                    }
                }
                else
                {
                    foreach ($articles as $key =>$article)
                    {
                        $auteur_present = false;
                        if($article->getCategorie()->getNom() != $categorie)
                        {
                            unset($articles[$key]);
                        }
                        foreach($article->getAuteur() as $auteur_trie)
                        {
                            if($auteur_trie->getUsername() == $auteur)
                            {
                                $auteur_present = true;
                            }
                        }
                        if($auteur_present != true)
                        {
                            unset($articles[$key]);
                        }
                    }
                }
            }
            elseif($format != 'format')
            {
                foreach ($articles as $key =>$article)
                {
                    $auteur_present = false;
                    if($article->getFormat()->getNom() != $format)
                    {
                        unset($articles[$key]);
                    }
                    foreach($article->getAuteur() as $auteur_trie)
                    {
                        if($auteur_trie->getUsername() == $auteur)
                        {
                            $auteur_present = true;
                        }
                    }
                    if($auteur_present != true)
                    {
                        unset($articles[$key]);
                    }
                }
            }
            else
            {
                foreach ($articles as $key =>$article)
                {
                    $auteur_present = false;
                    foreach($article->getAuteur() as $auteur_trie)
                    {
                        if($auteur_trie->getUsername() == $auteur)
                        {
                            $auteur_present = true;
                        }
                    }
                    if($auteur_present != true)
                    {
                        unset($articles[$key]);
                    }
                }
            }
        }
        elseif ($categorie != 'categorie')
        {
            if($format != 'format')
            {
                foreach ($articles as $key =>$article)
                {
                    if($article->getCategorie()->getNom() != $categorie)
                    {
                        unset($articles[$key]);
                    }
                    if($article->getFormat()->getNom() != $format)
                    {
                        unset($articles[$key]);
                    }
                }
            }
            else
            {
                foreach ($articles as $key =>$article)
                {
//                    var_dump($article->getCategorie());
                    if($article->getCategorie()->getNom() != $categorie)
                    {
                        unset($articles[$key]);
                    }
                }
            }
        }
        elseif ($format != 'format')
        {
            foreach ($articles as $key =>$article)
            {
                if($article->getFormat()->getNom() != $format)
                {
                    unset($articles[$key]);
                }
            }
        }
//        var_dump($don);

        $content = $this->RenderView('MainBundle:Articles:layout\articles_trie.html.twig', array(
            'articles' => $articles,
        ));
        $response = new JsonResponse();
        $response->setData(array('classifiedList' => $content));
        return $response;
    }
    public function NewArticleAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if( $user != "anon.") {
            $this->redirectToRoute('fos_user_security_login');
        }
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('UserBundle:User')->find($user);
        $article = new Articles();
        $form =$this->createForm(new ArticlesType($user));
        $form->handleRequest($request);
        if($form->isValid())
        {
           $request_tags = $request->request->get('main_mainbundle_articles')['tag'];
           $request_titre = $request->request->get('main_mainbundle_articles')['titre'];
           $request_contenu = $request->request->get('main_mainbundle_articles')['contenu'];
           $request_miniature =  $form->get('miniature')->getData();
           $request_banniere = $form->get('banniere')->getData();
           $request_categorie = $request->request->get('main_mainbundle_articles')['categorie'];
           $request_dossier =$form->get('dossier')->getData();
           $request_etat = $request->request->get('main_mainbundle_articles')['etat'];
           $request_user= $request->request->get('main_mainbundle_articles')['auteur'];

           $categorie = $em->getRepository('MainBundle:Categories')->find($request_categorie);
           $article->setTitre($request_titre);
           $article->setContenu($request_contenu);
           $article->setNombreCommentaire(0);
           $article->setNombreVues(0);
           $article->setSignalement(0);
           $article->setType('article');
           $article->setEtat($request_etat);
           $article->setDatePublication(new \DateTime("now"), new \DateTimeZone('Europe/Paris'));
           $article->setMiniature($request_miniature);
           $article->setBanniere($request_banniere);
           $article->setCategorie($categorie);
           $tags = explode(',',$request_tags);
           if($request_dossier != null )
           {

               $dossier =$em->getRepository('MainBundle:Dossier')->find($request_dossier);
               $article->setDossier($dossier);
           }
           foreach ($request_user as $auteur)
           {
               $user = $em->getRepository('UserBundle:User')->find($auteur);
               $article->addAuteur($user);
           }
           foreach ($tags as $tag)
           {
               $checkTag = $em->getRepository('MainBundle:Tags')->findOneByTitre($tag);
               if($checkTag == null)
               {
                   $create_tag = new Tags();
                   $create_tag->setTitre($tag);
                   $article->addTag($create_tag);
                   $em->persist($create_tag);

               }
               else
               {
                   $article->addTag($checkTag);
               }
           }
            $em->persist($article);
           $em->flush();
           return $this->redirectToRoute('index');
        }
        return $this->render('MainBundle:Articles:layout\new_article.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function commentAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if( $user != "anon.") {
            $request = $this->container->get('request');

            $id = $request->query->get('id');
            $commentSite = $request->query->get('comment');

            $em = $this->getDoctrine()->getManager();
            $article = $em->getRepository('MainBundle:Articles')->findOneById($id);
//            $comments = $em->getRepository('MainBundle:Comments')->findByOffre($id);
            $comment = new Comments();
            $comment->setComment($commentSite);
//            $comment->setOffre($offre);
            $comment->setDateComment(new \DateTime("now"), new \DateTimeZone('Europe/Paris'));
            $comment->setUser($user);
            $article->addCommentaire($comment);
            $article->setNombreCommentaire($article->getNombreCommentaire()+1);
            $em->persist($comment);
            $em->persist($article);
            $em->flush();
//            $comments = $em->getRepository('MainBundle:Comments')->findByOffre($id);
//            $value =$commentSite;
            $content = $this->RenderView('MainBundle:Articles:layout\commentArticle.html.twig', array(
//                'offre' => $offre,
                'article'=>$article,
//                'value'=>$value,
            ));
            $response = new JsonResponse();
            $response->setData(array('classifiedList' => $content));
            return $response;
        }
    }
}
