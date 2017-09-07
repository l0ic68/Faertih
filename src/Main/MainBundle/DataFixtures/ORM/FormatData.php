<?php
namespace Main\MainBundle\DataFixtures\ORM ;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Main\MainBundle\Entity\Format;

class FormatData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $format_1 = new Format();
        $format_1->setNom('Dossier');
        $format_1->setType('article');
        $manager->persist($format_1);

        $format_2 = new Format();
        $format_2->setNom('Test');
        $format_2->setType('article');
        $manager->persist($format_2);

        $format_3 = new Format();
        $format_3->setNom('Interview');
        $format_3->setType('article');
        $manager->persist($format_3);


        $format_4 = new Format();
        $format_4->setNom('News');
        $format_4->setType('article');
        $manager->persist($format_4);


        $manager->flush();

        $this->addReference('format_1', $format_1);
        $this->addReference('format_2', $format_2);
        $this->addReference('format_3', $format_3);
        $this->addReference('format_4', $format_4);

    }

    public function getOrder()
    {
        return 1;
    }
}
