<?php
namespace Main\MainBundle\DataFixtures\ORM ;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Main\MainBundle\Entity\Articles;

class ArticlesData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $Article_1 = new Articles();
        $Article_1->setTitre('Jeu');
        $Article_1->setCategorie($this->getReference('Categories_article_1'));
        $Article_1->setFormat($this->getReference('format_1'));
        $Article_1->AddAuteur($this->getReference('user_loic'));
        $Article_1->setContenu('Voici le contenu de mon article, il concernera principalement les jeux vidéos ');
        $Article_1->setBanniere($this->getReference('banniere_jeu'));
        $Article_1->setDatePublication(new \DateTime('now'), new \DateTimeZone('Europe/Paris'));
        $Article_1->setMiniature($this->getReference('miniature_jeu'));
        $Article_1->setEtat('test');
        $Article_1->setNombreCommentaire(0);
        $Article_1->setNombreVues(0);
        $Article_1->setSignalement(0);
        $Article_1->setType('article');
//        $Article_1->setPromoted($this->getReference('Promoted'));
        $manager->persist($Article_1);

        $Article_2 = new Articles();
        $Article_2->setTitre('com4up');
        $Article_2->setCategorie($this->getReference('Categories_article_2'));
        $Article_2->setFormat($this->getReference('format_2'));
        $Article_2->AddAuteur($this->getReference('user_loic'));
        $Article_2->AddAuteur($this->getReference('user_seb'));
//        $Article_2->setPromoted($this->getReference('NotPromoted'));
        $Article_2->setContenu("Cette article concerne l'ouverture de COM4UP");
        $Article_2->setBanniere($this->getReference('banniere_com4up'));
        $Article_2->setDatePublication(new \DateTime('now'),new \DateTimeZone('Europe/Paris'));
        $Article_2->setMiniature($this->getReference('miniature_com4up'));
        $Article_2->setNombreCommentaire(0);
        $Article_2->setNombreVues(0);
        $Article_2->setEtat('test');
        $Article_2->setSignalement(0);
        $Article_2->setType('article');
        $manager->persist($Article_2);

        $Article_3 = new Articles();
        $Article_3->setTitre("Faerith's");
        $Article_3->setCategorie($this->getReference('Categories_article_3'));
        $Article_3->setFormat($this->getReference('format_3'));
        $Article_3->AddAuteur($this->getReference('user_seb'));
        $Article_3->setContenu("Cette artcile vas nous parler de Faerith's");
        $Article_3->setBanniere($this->getReference('banniere_faerith'));
        $Article_3->setDatePublication(new \DateTime('now'), new \DateTimeZone('Europe/Paris'));
        $Article_3->setMiniature($this->getReference('miniature_faerith'));
        $Article_3->setNombreCommentaire(0);
        $Article_3->setNombreVues(0);
        $Article_3->setEtat('test');
        $Article_3->setSignalement(0);
        $Article_3->setType('article');
//        $Article_3->setPromoted($this->getReference('Promoted'));
        $manager->persist($Article_3);

        $manager->flush();

        $this->addReference('Article_1', $Article_1);
        $this->addReference('Article_2', $Article_2);
        $this->addReference('Article_3', $Article_3);
    }

    public function getOrder()
    {
        return 3;
    }
}
