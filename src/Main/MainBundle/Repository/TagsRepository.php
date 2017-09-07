<?php

namespace Main\MainBundle\Repository;

/**
 * TagsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TagsRepository extends \Doctrine\ORM\EntityRepository
{
    public function filter($tags) {
        $names = array();
        $flatTags = array();

        foreach ($tags->toArray() as $k => $tag) {
            if (in_array($tag->getLibelle(), $flatTags)) {
                $tags->remove($k);
                continue;
            }

            $flatTags[] = $tag->getLibelle();

            if ($tag->getId() === null) {
                $names[$k] = $tag->getLibelle();
            }
        }

        if (!$names) {
            return;
        }

        $qb = $this->createQueryBuilder('t');
        $tagsInDB = $qb->where($qb->expr()->in('t.libelle', $names))
            ->getQuery()
            ->getResult();

        foreach ($tagsInDB as $tag) {
            $tags->remove(array_search($tag->getLibelle(), $names));
            $tags->add($tag);
        }
    }
}
