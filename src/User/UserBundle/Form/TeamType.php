<?php

namespace User\UserBundle\Form;

use Main\MainBundle\Form\MediaType;
use Main\MainBundle\Form\ServeurType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use User\UserBundle\Entity\Reseau;

class TeamType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
            ->add('description')
//            ->add('date')
            ->add('Social',new ReseauType())
            ->add('banniere',new MediaType())
            ->add('logo_team',new MediaType())
            ->add('submit','submit');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'User\UserBundle\Entity\Team'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'user_userbundle_team';
    }


}
