<?php
namespace Main\MainBundle\DataFixtures\ORM ;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Main\MainBundle\Entity\Serveur;

class ServeurData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $serveur_1 = new Serveur();
        $serveur_1->setNom('World of Warcraft');
        $serveur_1->setDescription("il s'agit du serveur WOW de faertih");
        $serveur_1->setMiniature($this->getReference('WOW'));
        $manager->persist($serveur_1);

        $serveur_2 = new Serveur();
        $serveur_2->setNom('Counter Strike');
        $serveur_2->setDescription("il s'agit du serveur CS de faertih");
        $serveur_2->setMiniature($this->getReference('CS'));
        $manager->persist($serveur_2);

        $manager->flush();

        $this->addReference('serveur_1', $serveur_1);
        $this->addReference('serveur_2', $serveur_2);
    }

    public function getOrder()
    {
        return 3;
    }
}
