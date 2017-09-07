<?php

namespace User\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Later
 *
 * @ORM\Table(name="Later")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\VideosRepository")
 */
class Later
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
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Videos", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $video;

    /**
     * @ORM\ManyToOne(targetEntity="Main\MainBundle\Entity\Articles", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $article;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->expediteur = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set video
     *
     * @param \Main\MainBundle\Entity\Videos $video
     *
     * @return Later
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

    /**
     * Set article
     *
     * @param \Main\MainBundle\Entity\Articles $article
     *
     * @return Later
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
}
