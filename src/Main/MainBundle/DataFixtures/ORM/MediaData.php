<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 08/02/2017
 * Time: 11:48
 */

namespace Main\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Main\MainBundle\Entity\Media;



class MediaData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $banniere_jeu = new Media();
        $banniere_jeu->setPath('img/skyrim.jpg');
        $banniere_jeu->setUrl('skyrim.jpg');
        $manager->persist($banniere_jeu);

        $miniature_jeu = new Media();
        $miniature_jeu->setPath('img/bioshock.jpg');
        $miniature_jeu->setUrl('bioshock.jpg');
        $manager->persist($miniature_jeu);

        $banniere_com4up = new Media();
        $banniere_com4up->setPath('img/banniere_com4up.png');
        $banniere_com4up->setUrl('banniere_com4up.png');
        $manager->persist($banniere_com4up);

        $miniature_com4up = new Media();
        $miniature_com4up->setPath('img/miniature_com4up.png');
        $miniature_com4up->setUrl('miniature_com4up.png');
        $manager->persist($miniature_com4up);

        $banniere_faerith = new Media();
        $banniere_faerith->setPath('img/banniere_faerith.png');
        $banniere_faerith->setUrl('banniere_faerith.png');
        $manager->persist($banniere_faerith);

        $miniature_faerith = new Media();
        $miniature_faerith->setPath('img/miniature_faerith.png');
        $miniature_faerith->setUrl('miniature_faerith.png');
        $manager->persist($miniature_faerith);

        $skyrim2 = new Media();
        $skyrim2->setPath('img/skyrim2.jpg');
        $skyrim2->setUrl('skyrim2.jpg');
        $manager->persist($skyrim2);

        $skyrim = new Media();
        $skyrim->setPath('img/skyrim.jpg');
        $skyrim->setUrl('skyrim.jpg');
        $manager->persist($skyrim);

        $banniere_seb = new Media();
        $banniere_seb->setPath('img/banner_monogatari.jpeg');
        $banniere_seb->setUrl('banner_monogatari.jpeg');
        $manager->persist($banniere_seb);


        $profil_seb = new Media();
        $profil_seb->setPath('img/Profil_Shinobu.jpg');
        $profil_seb->setUrl('Profil_Shinobu.jpg');
        $manager->persist($profil_seb);

        $cs = new Media();
        $cs->setPath('img/CS.png');
        $cs->setUrl('CS.png');
        $manager->persist($cs);

        $wow = new Media();
        $wow->setPath('img/wow.jpg');
        $wow->setUrl('wow.jpg');
        $manager->persist($wow);



        $manager->flush();

        $this->addReference('skyrim2',$skyrim2);
        $this->addReference('skyrim',$skyrim);
        $this->addReference('banniere_jeu',$banniere_jeu);
        $this->addReference('miniature_jeu',$miniature_jeu);
        $this->addReference('banniere_com4up',$banniere_com4up);
        $this->addReference('miniature_com4up',$miniature_com4up);
        $this->addReference('banniere_faerith',$banniere_faerith);
        $this->addReference('miniature_faerith',$miniature_faerith);
        $this->addReference('banniere_seb',$banniere_seb);
        $this->addReference('profil_seb',$profil_seb);
        $this->addReference('CS',$cs);
        $this->addReference('WOW',$wow);

    }

    public function getOrder()
    {
        return 1;
    }
}