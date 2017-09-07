<?php

namespace Main\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PromotedArticle
 *
 * @ORM\Table(name="promoted_article")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\PromotedRepository")
 */
class PromotedArticle
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
     * @ORM\JoinColumn(nullable=false)
     */
    public $article;


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
     * @return PromotedArticle
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
     * @return PromotedArticle
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
