<?php
namespace Main\MainBundle\DataFixtures\ORM ;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Main\MainBundle\Entity\PromotedArticle;

class PromotedArticleData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
    $promoted_1 = new PromotedArticle();
        $promoted_1->setDate(new \DateTime('now',new \DateTimeZone('Europe/Paris')));
        $promoted_1->setArticle($this->getReference('Article_1'));
//        $Article_1->setPromoted($this->getReference('Promoted'));
        $manager->persist($promoted_1);

        $promoted_2 = new PromotedArticle();
        $promoted_2->setDate(new \DateTime('now',new \DateTimeZone('Europe/Paris')));
        $promoted_2->setArticle($this->getReference('Article_2'));
//        $Article_1->setPromoted($this->getReference('Promoted'));
        $manager->persist($promoted_2);

        $promoted_3 = new PromotedArticle();
        $promoted_3->setDate(new \DateTime('now',new \DateTimeZone('Europe/Paris')));
        $promoted_3->setArticle($this->getReference('Article_3'));
//        $Article_1->setPromoted($this->getReference('Promoted'));
        $manager->persist($promoted_3);

        $manager->flush();

        $this->addReference('promotedArticle_1', $promoted_1);
        $this->addReference('promotedArticle_2', $promoted_2);
        $this->addReference('promotedArticle_3', $promoted_3);
    }

    public function getOrder()
    {
        return 4;
    }
}
