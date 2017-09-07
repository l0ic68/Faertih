<?php

namespace Main\MainBundle\Form;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;



class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //ici nous allons faire notre formulaire en PHP
        $builder
            ->add('nom', 'text', array('label' => 'Nom',
                                          'attr' => array('class' => 'input-medium search-query form-control','id'=>'pseudo',
                                          'placeholder' => 'Nom',)))
                                          
            ->add('email', EmailType::class, array('label' => 'Email',
                                          'attr' => array('class' => 'input-medium search-query form-control','id'=>'e-mail',
                                          'placeholder' => 'Email Adress',)))
                                          
            ->add('objet', 'text', array('label' => 'Objet',
                                          'attr' => array('class' => 'input-medium search-query form-control','id'=>'Objet',
                                          'placeholder' => 'Objet',)))

//            ->add('objet', 'text', array('label' => 'Objet',
//                                          'attr' => array('class' => 'input-medium search-query form-control',
//                                          'placeholder' => 'Objet',)))
                                          
            ->add('message', 'textarea', array('label' => 'Message',
                                          'attr' => array('class' => 'input-medium search-query form-control','id'=>'Message',
                                          'placeholder' => 'Your message',)));
//            ->add('send', 'submit', array('label' => 'Envoyer',
//                                          'attr' => array('class' => 'btn btn-danger raised','id'=>'Envoyer',
//                                          'placeholder' => 'Envoyer',)));

    }

    public function getName()
    {
        return 'main_mainbundle_contact';
    }
}