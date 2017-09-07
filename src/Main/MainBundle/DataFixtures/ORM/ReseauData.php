<?php
namespace Main\MainBundle\DataFixtures\ORM ;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Main\MainBundle\Entity\Categories;
use User\UserBundle\Entity\Reseau;

class ReseauData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $social_loic = new Reseau();
        $social_loic->setFacebook('');
        $social_loic->setDiscord('');
        $social_loic->setInstagram('');
        $social_loic->setSoundcloud('');
        $social_loic->setTumblr('');
        $social_loic->setTwitch('');
        $social_loic->setTwitter('');
        $social_loic->setYoutube('');
        $social_loic->setType('User');
        $manager->persist($social_loic);

        $social_Seb = new Reseau();
        $social_Seb->setFacebook('https://www.facebook.com/Fas.Nargash');
        $social_Seb->setDiscord('#7639');
        $social_Seb->setInstagram('');
        $social_Seb->setSoundcloud('');
        $social_Seb->setTumblr('');
        $social_Seb->setTwitch('');
        $social_Seb->setTwitter('https://twitter.com/Fas_Nargash');
        $social_Seb->setYoutube('');
        $social_Seb->setType('User');
        $manager->persist($social_Seb);



        $manager->flush();

        $this->addReference('social_loic', $social_loic);
        $this->addReference('social_seb', $social_Seb);

    }

    public function getOrder()
    {
        return 1;
    }
}
