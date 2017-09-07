<?php
namespace Main\MainBundle\DataFixtures\ORM ;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Main\MainBundle\Entity\Don;

class DonData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $Don_1 = new Don();
        $Don_1->setUser($this->getReference('user_loic'));
        $Don_1->setPaypal('Mon lien paypal');
        $Don_1->setPaypalLien('lien');
        $Don_1->setTipeee('Mon Tipee');
        $Don_1->setTipeeeLien('lien');
        $Don_1->setTwitchAlerts('Mon Twitch');
        $Don_1->setTwitchAlertsLien('lien');
        $manager->persist($Don_1);
        $manager->flush();

        $this->addReference('Don_1', $Don_1);
    }

    public function getOrder()
    {
        return 3;
    }
}
