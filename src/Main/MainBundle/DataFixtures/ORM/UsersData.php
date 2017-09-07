<?php
namespace Users\UsersBundle\DataFixtures\ORM ;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Validator\Constraints\Date;
use User\UserBundle\Entity\User;

class UsersData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    private $container;
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $role_Admin = array('ROLE_ADMIN');
        $role_Moderateur = array('ROLE_MODERATEUR');


        $user_loic = new User();
        $user_loic->setRoles($role_Admin);
        $user_loic->setMedia($this->getReference('skyrim'));
        $user_loic->setBanniere($this->getReference('skyrim2'));
        $user_loic->setNom('Oulerich');
        $user_loic->setDescription("Je me présente, Loïc Oulerich, fan d'informatique, je suis l'un des fondateurs du site");
        $user_loic->setAge(new \DateTime("17-10-1997"));
        $user_loic->setCreation(new \DateTime('now'));
        $user_loic->setSocial($this->getReference('social_loic'));
        $user_loic->setNewsm(false);
        $user_loic->setNewss(false);
        $user_loic->setSexe('homme');
        $user_loic->setUsername('Nesta');
        $user_loic->setPrenom('Loic');
        $user_loic->setEmail('loic.oulerich@viacesi.fr');
        $user_loic->setPassword($this->container->get('security.encoder_factory')->getEncoder($user_loic)->encodePassword('titi', $user_loic->getSalt()));
        $user_loic->setEnabled(1);
        $manager->persist($user_loic);

        $user_Seb = new User();
        $user_Seb->setRoles($role_Moderateur);
        $user_Seb->setMedia($this->getReference('profil_seb'));
        $user_Seb->setBanniere($this->getReference('banniere_seb'));
        $user_Seb->setNom('Oulerich');
        $user_Seb->setDescription("Administrateur de @Faeriths | Entrepreneur, Développeur web Collectionneur, Otaku et pas mal d'autres choses φ");
        $user_Seb->setAge(new \DateTime("22-11-1997"));
        $user_Seb->setCreation(new \DateTime('now'));
        $user_Seb->setSocial($this->getReference('social_seb'));
        $user_Seb->setNewsm(false);
        $user_Seb->setNewss(false);
        $user_Seb->setSexe('homme');
        $user_Seb->setUsername('Nargash');
        $user_Seb->setPrenom('Sebastien');
        $user_Seb->setEmail('nargash.faeriths@gmail.com');
        $user_Seb->setEnabled(1);
        $user_Seb->setPassword($this->container->get('security.encoder_factory')->getEncoder($user_Seb)->encodePassword('2211', $user_Seb->getSalt()));
        $manager->persist($user_Seb);



        $manager->flush();

        $this->addReference('user_seb', $user_Seb);
        $this->addReference('user_loic', $user_loic);
//        $this->addReference('user_cedric', $user_cedric);
//        $this->addReference('user_cyril', $user_cyril);
    }
    public function getOrder()
    {
        return 2;
    }
}