<?php

namespace Main\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promoted
 *
 * @ORM\Table(name="promoted")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\PromotedRepository")
 */
class Promoted
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     * @ORM\JoinColumn(nullable=false)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Articles", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
   public $article;

    /**
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Videos", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    public $video;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Promoted
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set article
     *
     * @param \Main\MainBundle\Entity\Articles $article
     *
     * @return Promoted
     */
    public function setArticle(\Main\MainBundle\Entity\Articles $article = null)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \Main\MainBundle\Entity\Articles
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set video
     *
     * @param \Main\MainBundle\Entity\Videos $video
     *
     * @return Promoted
     */
    public function setVideo(\Main\MainBundle\Entity\Videos $video = null)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return \Main\MainBundle\Entity\Videos
     */
    public function getVideo()
    {
        return $this->video;
    }
}
