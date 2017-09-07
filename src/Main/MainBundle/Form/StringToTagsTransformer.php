<?php

namespace Main\MainBundle\Form;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;
use Main\MainBundle\Entity\Tags;

class StringToTagsTransformer implements DataTransformerInterface
{

    private $om;

    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    public function reverseTransform($ftags)
    {
        $tags = new ArrayCollection();
        $tag = strtok($ftags, ",");
        while($tag !== false) {
            $itag = new Tags();
            $itag->setLibelle($tag);
            if(!$tags->contains($itag))
                $tags[] = $itag;
            $tag = strtok(",");
        }
        return $tags;
    }

    public function transform($tags)
    {
        $ftags = "";
        if($tags != null) {
            foreach($tags as $tag)
                $ftags = $ftags.','.$tag->getLibelle();

        }
        return $ftags;
    }
}

