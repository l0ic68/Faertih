<?php
namespace Main\MainBundle\DataFixtures\ORM ;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Main\MainBundle\Entity\Videos;

class VideosData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $Video_1 = new Videos();
        $Video_1->setTitre('Video 1');
        $Video_1->setCategorie($this->getReference('Categories_video_1'));
        $Video_1->setAuteur($this->getReference('user_loic'));
        $Video_1->setContenu('Voici le contenu de mon article, il concernera principalement les jeux vidéos ');
        $Video_1->setBanniere($this->getReference('banniere_jeu'));
        $Video_1->setDatePublication(new \DateTime('now'), new \DateTimeZone('Europe/Paris'));
        $Video_1->setMiniature($this->getReference('miniature_jeu'));
        $Video_1->setNombreCommentaire(0);
        $Video_1->setNombreVues(0);
        $Video_1->setSignalement(0);
        $Video_1->setDescription('test');
        $Video_1->setType('video');
//        $Video_1->setPromoted($this->getReference('Promoted'));
        $manager->persist($Video_1);

        $Video_2 = new Videos();
        $Video_2->setTitre('Video 2');
        $Video_2->setCategorie($this->getReference('Categories_video_2'));
        $Video_2->setAuteur($this->getReference('user_loic'));
        $Video_2->setContenu('Voici le contenu de mon article, il concernera principalement les jeux vidéos ');
        $Video_2->setBanniere($this->getReference('banniere_jeu'));
        $Video_2->setDatePublication(new \DateTime('now'), new \DateTimeZone('Europe/Paris'));
        $Video_2->setMiniature($this->getReference('miniature_jeu'));
        $Video_2->setNombreCommentaire(0);
        $Video_2->setNombreVues(0);
        $Video_2->setSignalement(0);
        $Video_2->setDescription('test');
        $Video_2->setType('video');
//        $Video_2->setPromoted($this->getReference('NotPromoted'));
        $manager->persist($Video_2);

        $Video_3 = new Videos();
        $Video_3->setTitre('Video 3');
        $Video_3->setCategorie($this->getReference('Categories_video_3'));
        $Video_3->setAuteur($this->getReference('user_loic'));
        $Video_3->setContenu('Voici le contenu de mon article, il concernera principalement les jeux vidéos ');
        $Video_3->setBanniere($this->getReference('banniere_jeu'));
        $Video_3->setDatePublication(new \DateTime('now'), new \DateTimeZone('Europe/Paris'));
        $Video_3->setMiniature($this->getReference('miniature_jeu'));
        $Video_3->setNombreCommentaire(0);
        $Video_3->setNombreVues(0);
        $Video_3->setSignalement(0);
        $Video_3->setType('video');
        $Video_3->setDescription('test');

//        $Video_3->setPromoted($this->getReference('Promoted'));
        $manager->persist($Video_3);

        $manager->flush();

        $this->addReference('Video_1', $Video_1);
        $this->addReference('Video_2', $Video_2);
        $this->addReference('Video_3', $Video_3);
    }

    public function getOrder()
    {
        return 3;
    }
}
