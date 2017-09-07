<?php
// src/AppBundle/Form/RegistrationType.php

namespace User\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Nouveau_MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('destinataire', 'text', array('label' => 'Destinataire',
                'attr' => array('class' => 'input-medium search-query form-control',
                    'placeholder' => 'Destinataire',)))
            ->add('objet', 'text', array('label' => 'objet',
                'attr' => array('class' => 'input-medium search-query form-control',
                    'placeholder' => 'objet',)))
            ->add('message', 'textarea', array('label' => 'message'))
            ->add('submit','submit')
        ;
    }

//    public function setDefaultOptions(OptionsResolverInterface $resolver)
//    {
//        $resolver->setDefaults(array(
//            'data_class' => 'User\UserBundle\Entity\Message'
//        ));
//    }
}