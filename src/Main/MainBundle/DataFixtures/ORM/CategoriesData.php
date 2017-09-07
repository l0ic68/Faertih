<?php
namespace Main\MainBundle\DataFixtures\ORM ;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Main\MainBundle\Entity\Categories;

class CategoriesData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $Categories_video_1 = new Categories();
        $Categories_video_1->setNom('Categorie video 1');
        $Categories_video_1->setType('video');
        $manager->persist($Categories_video_1);

        $Categories_video_2 = new Categories();
        $Categories_video_2->setNom('Categorie video 2');
        $Categories_video_2->setType('video');
        $manager->persist($Categories_video_2);

        $Categories_video_3 = new Categories();
        $Categories_video_3->setNom('Categorie video 3');
        $Categories_video_3->setType('video');
        $manager->persist($Categories_video_3);


        $Categories_article_1 = new Categories();
        $Categories_article_1->setNom('Musique');
        $Categories_article_1->setType('article');
        $manager->persist($Categories_article_1);

        $Categories_article_2 = new Categories();
        $Categories_article_2->setNom('Jeu');
        $Categories_article_2->setType('article');
        $manager->persist($Categories_article_2);

        $Categories_article_3 = new Categories();
        $Categories_article_3->setNom('Film');
        $Categories_article_3->setType('article');
        $manager->persist($Categories_article_3);


        $manager->flush();

        $this->addReference('Categories_video_1', $Categories_video_1);
        $this->addReference('Categories_video_2', $Categories_video_2);
        $this->addReference('Categories_video_3', $Categories_video_3);

        $this->addReference('Categories_article_1', $Categories_article_1);
        $this->addReference('Categories_article_2', $Categories_article_2);
        $this->addReference('Categories_article_3', $Categories_article_3);
    }

    public function getOrder()
    {
        return 1;
    }
}
