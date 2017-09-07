<?php

namespace Main\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Main\MainBundle\Form\StringToTagsTransformer;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TagType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre','text')
                ->add('submit', 'submit');
//                ->add('miniature',new MediaType())
//                ->add('banniere',new MediaType());
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Main\MainBundle\Entity\Tags'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'main_mainbundle_tag';
    }


}