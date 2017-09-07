<?php

namespace Main\MainBundle\Form;

use Main\MainBundle\Repository\CategoriesRepository;
use Main\MainBundle\Repository\DossierRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ArticlesType extends AbstractType
{

    public function __construct($user)
    {
        $this->user=$user;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $this->user;
        $builder->add('titre','text')
                ->add('contenu', 'textarea',array('attr' => array('class' => 'ckeditor')))
//                ->add('date_publication')
//                ->add('nombre_commentaire')
//                ->add('nombre_vues')
//                ->add('signalement')
//                ->add('type')
                ->add('etat',ChoiceType::class, array('choices'=> array(
                                                  'Maintenant' =>array(
                                                 'brouillon' => 'brouillon',
                                                 'privé' => 'privé',),
                                                 'Programmer'=>array(
                                                   TextType::class )
                                                 )))
                ->add('categorie','entity', array('class' => 'MainBundle:Categories',
                                                  'property' => 'nom',
                                                  'query_builder' =>function(CategoriesRepository $er){
                                                        return $er->createQueryBuilder('a')
                                                            ->where("a.type = 'article'");
                                                  }))
                ->add('dossier', 'entity' , array('class' => 'MainBundle:Dossier',
                                                  'property' => 'titre',
                                                  'empty_value' => 'Pas de dossier',
                                                  'empty_data' => null,
                    'required' => false,
                                                  'query_builder' => function(DossierRepository $er) use ($user){
                                                        return $er->createQueryBuilder('a')
                                                            ->where("a.auteur = :user")
                                                            ->setParameter('user',$user);
                                                  },
                                                   ))
                ->add('auteur', 'entity', array('class' => 'UserBundle:User',
                                                  'property' => 'username',
                                                  'multiple' => 'true',
                                                  'expanded' => 'false'))
                ->add('tag','text')

                ->add('miniature',new MediaType())
                ->add('banniere',new MediaType())
            ->add('submit', 'submit');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Main\MainBundle\Entity\Articles'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'main_mainbundle_articles';
    }


}
